<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Rounds extends Model
{
    use HasFactory;

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

        if(!$check) {
            return response('Nastala chyba při mazání dat z rounds všech kol', 500)->header('Content-Type', 'text/plain');
        }

    }

    /**
     * @param $lobby_id = ID lobby ze kterého chceme poslední kolo
     * @return mixed = Object round
     */
    static function getLastRound($lobby_id){
        return Rounds::where('lobby_id', $lobby_id)->orderBy('id', 'desc')->first();
    }
}
