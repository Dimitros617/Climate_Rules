<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Nations extends Model
{
    use HasFactory;

    public  $timestamps = false;
    protected $fillable = ['money'];

    static function removeNation($nation_id){

        Round_to_nation_statistics::deleteNationStatistics($nation_id);
        Nation_statistic_values::deleteNationStatisticValues(Nations::find($nation_id)->statistic_values_set,Nations::find($nation_id)->lobby_id);

        Nations::find($nation_id)->delete();

    }

    static function addStatsToNations($nations_arr, $round_id){

//        foreach ($nations_arr as $nation){
//            $nation->statss = Round_to_nation_statistics::oneRoundAllStatisticsOneNation($round_id, $nation->id);
//        }
//        return $nations_arr;

        for ($j = 0 ; $j< count($nations_arr); $j++){

            $rawStat = Round_to_nation_statistics::lastValueAllStatisticOneNation($nations_arr[$j]->id);


            $stat = array();
            $stat_string = "{";

            for ($i = 0 ; $i< count($rawStat); $i++){
                $stat_string =  $stat_string.'"'.$rawStat[$i]->statistic_type_code_name.'":'.$rawStat[$i]->value.',';

            }
            $stat_string = substr($stat_string, 0, -1);
            $stat_string = $stat_string.'}';
            array_push($stat,json_decode($stat_string));

            $nations_arr[$j]->stats = $stat;
        }

        return $nations_arr;

    }

    /**
     * @param $nation_id
     * @param $lobby_id
     * @return bool
     */
    public static function isNationInLobby($nation_id, $lobby_id){

        $check = Nations::where('id', $nation_id)->where('lobby_id', $lobby_id)->get();

        if(count($check) == 0){
            return false;
        }else{
            return true;
        }

    }

    public static function getNationIdFromLobby($lobby_id, $nation_id = null){

        if(Auth::check() && Auth::permition()->admin == 1){

            $nation = Lobbies::getAdminNation($lobby_id);

            if(!is_int($nation_id) && str_contains( get_class($nation), 'Response')){
                return $nation;
            }

            $ret_nation_id = $nation->id;

        }elseif($nation_id == null){


            $nation = Lobbies::getMyNation($lobby_id);

            if( is_numeric($nation) && $nation == -1){
                return response('Nelze vstoupit, nebyl tvémů účtu přiřazen žádný hráč v tomto lobby!', 500)->header('Content-Type', 'text/plain');
            }

            if(is_numeric($nation) && $nation == -2){
                return response('Nelze vstoupit, tvémů účtu je přiřazeno více hráčů!', 500)->header('Content-Type', 'text/plain');
            }

            $ret_nation_id = $nation->id;
        }
        else{
            if(Nations::isNationInLobby($nation_id,$lobby_id)){
                $ret_nation_id = $nation_id;
            }else{
                return response('Zadané ID národa: ' . $nation_id . ' Není validní id v lobby s ID: ' . $lobby_id, 500)->header('Content-Type', 'text/plain');
            }
        }

        return $ret_nation_id;
    }


}
