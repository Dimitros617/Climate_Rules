<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LobbiesController extends Controller
{
    function showLobbies()
    {
        Log::info('LobbiesController:showAlllobbies');
        return view('lobbies', ['lobbies' => $this->getLobbies()]);

    }

    function getLobbies(){

        $data = DB::table('lobbies')
            ->get();

        return $data;
    }

    /**
     * vytvoření nového lobby po zavolání routy /addLobby
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */
    function addLobby()
    {
        Log::info('LobbiesController:addLobby');


        $lobby = new Lobbies;
        $lobby->name = 'Nové lobby';
        $lobby->difficulty = $lobby->getIdbyCode('1');
        $lobby->created_at = Carbon::now()->toDateTimeString();
        $check = $lobby->save();

        if(!$check){
            return response('Chyba při ukládání do databáze Lobbies!', 500)->header('Content-Type', 'text/plain');
        }

    }
}
