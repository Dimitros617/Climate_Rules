<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LobbiesController extends Controller
{
    function showLobbies()
    {
        Log::info('LobbiesController:showAlllobbies');
        return view('lobbies', ['lobbies' => $this->getLobbies()]);

    }

    function getLobbiesHTML(){
        Log::info('LobbiesController:getLobbiesHTML');
        return view('lobbies-list', ['lobbies' => $this->getLobbies(), 'myLobbies' => $this->getMyLobbies()]);
    }

    function getLobbies(){

        Log::info('LobbiesController:getLobbies');
        $data = DB::table('lobbies')
            ->orderBy('visible', 'desc')
            ->orderBy('name', 'asc')
            ->get();

        return $data;
    }

    function getMyLobbies(){

        Log::info('LobbiesController:getMyLobbies');

        if(!Auth::check()){
            return;
        }
        $data = DB::table('lobbies')
            ->Join('users', 'lobbies.id', '=', 'users.lobby')
            ->where('users.id', '=', Auth::user()->id)
            ->orderBy('visible', 'desc')
            ->orderBy('name', 'asc')
            ->select('lobbies.*')
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
