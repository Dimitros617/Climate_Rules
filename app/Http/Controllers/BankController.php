<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Nations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{
    function show($lobby_id){

        Log::info('BankController:show');

        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }

        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);

        return view('bank', ['lobby' => $lobby, 'my_nation' => $my_nation]);
;
    }
}
