<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Nations;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    function updateTemperatureActualValue($id){
        Log::info('GameController:updateTemperatureActualValue');

        $gas_step = Lobbies::find($id)->gas_step;

        $round = DB::table('rounds')
            ->where('lobby_id', '=', $id)
            ->orderBy('id')
            ->first();

        return [$gas_step, $round];
    }

    function updateGlobalTable($id){


        $nations = Nations::where('lobby_id',$id)->get();
        $nations = Nations::addStatsToNations($nations, Rounds::getLastRound($id)->id);
        $statistics_types = DB::table('statistics_types')
            ->select('statistics_types.*')
            ->join('nation_statistic_values','statistics_types.id','=','nation_statistic_values.statistics_type_id')
            ->where('nation_statistic_values.set','=',$nations[0]->statistic_values_set)
            ->groupBy('statistics_types.code_name')
            ->get();

        if(!Lobbies::isDefinedNationsStatisticTypesSame($id)){
            return response('Zjistily jsme že různé národy používají různé datové sady a ukazatele!', 500)->header('Content-Type', 'text/plain');
        }

        return view('global-status-table', ['nations' => $nations, 'statistics_types' => $statistics_types]);


    }

    /**
     * Metoda u daného národa zvíší o definovaný počet definovaný statisctický ukazatel. pokud je mimo hranice vrací kod 500
     *
     * @param Request $request
     * nationID = id národa u kterého chceme změnit ukazatel
     * statisticTypeCode = statistický kod ukazatele který chceme u národa zvýšit
     * step = O kolik pozic chceme danou hodnotu zvíšit
     */
    function increaseValue(Request $request){
        Log::info('GameController:increaseValue');

        $res = Round_to_nation_statistics::increaseStaticticValueOfNation($request->nationId, $request->statisticTypeCode, $request->step);

        if($res == -3){
            return response('Nastala chyba při inkrementaci, krok zvíšení nemůže být <=0 !', 500)->header('Content-Type', 'text/plain');
        }
        if($res == -2){
            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
        }
        if($res == -1){
            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
        }
        if($res == 0){
            return response('Hodnotu už nelze více zvýšit. ' . $request->step . ' kroků je již mimo tabulku!', 500)->header('Content-Type', 'text/plain');
        }

    }

    function decreaseValue(Request $request){
        Log::info('GameController:decreaseValue');

        $res = Round_to_nation_statistics::decreaseStaticticValueOfNation($request->nationId, $request->statisticTypeCode, $request->step);

        if($res == -3){
            return response('Nastala chyba při dekrementaci, krok snížení nemůže být <=0 !', 500)->header('Content-Type', 'text/plain');
        }
        if($res == -2){
            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
        }
        if($res == -1){
            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
        }
        if($res == 0){
            return response('Hodnotu už nelze více snížit. ' . $request->step . ' kroků je již mimo tabulku!', 500)->header('Content-Type', 'text/plain');
        }

    }

    function addRound(Request $request){
        Log::info('GameController:addRound');


        if(!Rounds::newRound($request->lobbyId)){
            return response('Nastal problém při vytváření nového kola v lobby. ', 500)->header('Content-Type', 'text/plain');
        }

    }

    function getCountRounds($lobbyID){
        Log::info('GameController:getRoundNumber');
        return Rounds::getCountRoundsInLobby($lobbyID);
    }

    function getLobbyUsers($lobbyID){
        Log::info('GameController:getLobbyUsers');
        $users =  Lobbies::getAllUsersFromLobby($lobbyID);

        foreach ($users as $user){

            $clone = User::getCloneUser(Auth::user()->id,$lobbyID);

            if($clone != false && $user->id == $clone->clone_user_id){
                $user->checked = 1;
            }else{
                $user->checked = 0;
            }
        }


        return $users;

    }
}
