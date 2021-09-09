<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    /**
     * @param $lobby_id = ID lobby ze kterého chceme poslední kolo
     * @return mixed = Object round
     */
    static function getLastRound($lobby_id){
        return Rounds::where('lobby_id', $lobby_id)->orderBy('id', 'desc')->first();
    }
}
