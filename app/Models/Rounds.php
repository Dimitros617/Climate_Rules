<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Rounds extends Model
{
    use HasFactory;

    /**
     * Funkce přidá další kolo do daného lobby
     * @param $lobby_id
     * @return bool - Hodnota zda se záznam do databáze přidal v pořádku
     */
    static function newRound($lobby_id){

        $round = new Rounds();
        $round->lobby_id = $lobby_id;
        $round->created_at = Carbon::now()->toDateTimeString();
        $round->updated_at = Carbon::now()->toDateTimeString();
        $check = $round->save();

        return $check;

    }

    static function removeAllRoundFromLobby($lobby_id){

        $check = DB::table('rounds')
            ->where('lobby_id', '=', $lobby_id)
            ->delete();

        return $check;

    }

    /**
     * @param $lobby_id = ID lobby ze kterého chceme poslední kolo
     * @return mixed = Object round
     */
    static function getLastRound($lobby_id){
        return Rounds::where('lobby_id', $lobby_id)->orderBy('id', 'desc')->first();
    }

    static function getCountRoundsInLobby($lobby_id){
        return Rounds::where('lobby_id', $lobby_id)->count();
    }

    /**
     * @param $round_id
     * @param $nation_id
     * @return bool|null
     */
    static function hasNationSetTaxInRound($round_id, $nation_id){

        $ret = DB::table('round_to_nation_statistics')
            ->where('round_id', $round_id)
            ->where('nation_id', $nation_id)
            ->where('statistic_type_id', Statistics_types::getIdByCode('tax'))
            ->where('reason', 'like', '%tax_change%')
            ->count();

        if($ret == 1){
            return 1;
        }elseif ($ret == 0){
            return 0;
        }else{
            return null;
        }
    }
}
