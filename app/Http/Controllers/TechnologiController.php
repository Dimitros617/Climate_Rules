<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Nations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TechnologiController extends Controller
{
    function show($lobby_id){

        Log::info('TechnologiController:show');

        $lobby_phase = Lobbies::getLobbyPhase($lobby_id);

        if(Auth::check() && Auth::permition()->admin == 1){

            $nation_id = Lobbies::getFirstNation($lobby_id)->id;

        }else{

            if($lobby_phase->code == 1){
                return response('Nelze vstoupit, hra zatím nebyla spuštěna.', 500)->header('Content-Type', 'text/plain');
            }

            $nation = Lobbies::getMyNation($lobby_id);

            if( is_numeric($nation) && $nation == -1){
                return response('Nelze vstoupit, nebyl tvémů účtu přiřazen žádný hráč v této hře!', 500)->header('Content-Type', 'text/plain');
            }

            if(is_numeric($nation) && $nation == -2){
                return response('Nelze vstoupit, tvémů účtu je přiřazeno více hráčů!', 500)->header('Content-Type', 'text/plain');
            }

            $nation_id = $nation->id;
        }





        $allTechnologies = Lobby_to_technologies::getAlltechnologiesFromLobby($lobby_id);
        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);

        //return $allTechnologies;

            //TODO předat data z databáze
        return view('technologies', ['lobby' => $lobby, 'my_nation' => $my_nation, 'allTechnologies' => $allTechnologies]);
    }
}
