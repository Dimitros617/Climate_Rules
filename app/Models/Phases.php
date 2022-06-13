<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phases extends Model
{
    use HasFactory;

    public static function getIdByCode($code){

        return Phases::where('code', $code)->get()[0]->id;

    }

    public static function setLobbyPhase($lobbyId, $phaseId){

        $check = DB::table('lobbies')
        ->where('id', $lobbyId)
        ->update([
            'phase' => $phaseId
        ]);

    }
}
