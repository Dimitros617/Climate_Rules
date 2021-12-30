<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Lobby_to_technologies extends Model
{
    use HasFactory;

    public static function copyTechnologies($lobby_id){

        Log::info('Lobby_to_technologies:copyTechnologies');


        $technologies = DB::table('technologies')->get();

        Log::info('COUNT tecxhnologies: ' . count($technologies));

        $ret_chech = 0;

        foreach($technologies as $technology){

            $tech = new Lobby_to_technologies;
            $tech->technology_id = $technology->id;
            $tech->lobby_id = $lobby_id;
            $tech->round_show = $technology->round_show;
            $tech->round_hide = $technology->round_hide;
            $tech->certificate = $technology->certificate;
            $tech->visibility = $technology->visibility;

            $tech->created_at = Carbon::now()->toDateTimeString();
            $tech->updated_at = Carbon::now()->toDateTimeString();
            $check = $tech->save();


            if(!$check){
                $ret_chech++;
            }
        }

        if ($ret_chech != 0){
            return false;
        }
        else{
            return true;
        }

    }

    public static function removeAllTechnologies($lobby_id){

        $check = DB::table('lobby_to_technologies')
            ->where('lobby_id', '=', $lobby_id)
            ->delete();

        return $check;

    }


    /**
     * Funkce vrátí všechny technologie v lobby, v četně nastavení pro konkrétní lobby a propojením na area a branches tabulky + statistické typy které upravuje ve vnořeném objektu
     * @param $lobby_id
     * @return \Illuminate\Support\Collection -> Json
     */
    public static function getAlltechnologiesFromLobby($lobby_id){


        $technologies = DB::table('lobby_to_technologies')
                        ->select('lobby_to_technologies.*','technologies.name AS technology_name','technologies.code','technologies.description AS technologies_description','technologies.price','technologies.img_url','technologies_areas.name AS area_name','technologies_areas.description AS area_description','technologies_areas.icon AS area_icon','branches.name as branch_name','branches.color as branch_color')
                        ->join('technologies','lobby_to_technologies.technology_id','=','technologies.id')
                        ->join('technologies_areas','technologies.area_id','=','technologies_areas.id')
                        ->join('branches','technologies.branch_id','=','branches.id')
                        ->where('lobby_to_technologies.lobby_id','=',$lobby_id)
                        ->orderBy('technologies.round_show')
                        ->orderBy('technologies.branch_id')
                        ->orderBy('technologies.area_id')
                        ->orderBy('technologies.code')
                        ->get();

        foreach ($technologies as $technology){
            $technology->statistics_types = Technologies::getAllStatisticTypeOfTechnologi($technology->technology_id);
            $technology->nations_status = Nations_technologies::getAllNationsStatusOfTechnology($technology->id);
            $technology->nation_id = Nations::getNationIdFromLobby($lobby_id);
            $technology->my_status = Nations_technologies::getOneNationStatusOfTechnology(Nations::getNationIdFromLobby($lobby_id),$technology->id);
            $technology->workStatus = Nations_technologies::countNationsWithWorkStatus($technology->id);
            $technology->activeStatus = Nations_technologies::countNationsWithActiveStatus($technology->id);
            $technology->special_events = Special_technologies::getAllSpecialsOfTechnology($technology->technology_id);
        }

        return $technologies;

    }

    public static function isTechnologyCertificated($technology_id){

        if(Lobby_to_technologies::find($technology_id)->certificate == 1){
            return true;
        }
        else{
            return false;
        }

    }


}
