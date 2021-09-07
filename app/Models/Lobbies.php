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
}
