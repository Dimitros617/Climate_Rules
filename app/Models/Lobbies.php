<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Lobbies extends Model
{
    use HasFactory;

    public  $timestamps = false;

    function getIdbyCode($code){
        return Difficulties::where('code', $code)->value('id');
    }

    static function countNations($lobby_id){
        return DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->count();
    }

    static function getLobbyPhase($lobby_id){

        return DB::table('lobbies')
            ->Join('phases', 'lobbies.phase', '=', 'phases.id')
            ->where('lobbies.id', '=', $lobby_id)
            ->select('phases.*')
            ->get()[0];

    }

    static function getFirstNation($lobby_id){
        return DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->get()[0];
    }

    static function getMyNation($lobby_id){
        $nation = DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->where('user_id', '=', Auth::user()->id)
            ->get();


        if(count($nation) == 0){
            Log::info('Lobbies:getMyNation: tomuto účtu nebyl přidělen žádný hráč');

            return -1;
        }
        else if(count($nation) == 1){
            return $nation[0];
        }
        else{
            Log::info('Lobbies:getMyNation: Tomuto účtu bylo přiděleno více hráčů!!!!');
            return -2;
        }
    }

    /**
     * Metoda zkontroluje zda všechny národy v lobby používají stejný počet statystics types.
     *
     * @param $lobby_id
     * @return bool|null = pokud není v tabulce  nation_statistic_values ani jeden zavedený set
     */
    static function isDefinedNationsStatisticTypesSame($lobby_id){



        $sets = DB::table('nation_statistic_values')
            ->select('nation_statistic_values.set')
            ->where('lobby_id','=',$lobby_id)
            ->groupBy('nation_statistic_values.set')
            ->get();



        if(count($sets)==0){
            return null;
        }
        if(count($sets)==1){
            return true;
        }else{
            $sumA = DB::table('nation_statistic_values')
                ->selectRaw('COUNT(*) AS sum')
                ->where([['lobby_id',$lobby_id],['nation_statistic_values.set',$sets[0]->set]])
                ->groupBy('nation_statistic_values.statistics_type_id')
                ->get();
        }

        $diference = 0;

        for ($i = 1 ; $i< count($sets); $i++){

            $sumB = DB::table('nation_statistic_values')
                ->selectRaw('COUNT(*) AS sum')
                ->where([['lobby_id',$lobby_id],['nation_statistic_values.set',$sets[$i]->set]])
                ->groupBy('nation_statistic_values.statistics_type_id')
                ->get();

            if(count($sumA) != count($sumB)){
                $diference++;
            }

            $sumA = $sumB;
        }

        return $diference == 0 ? true : false;

    }
}
