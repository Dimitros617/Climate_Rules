<?php

namespace App\Http\Controllers;

use App\Models\Difficulties;
use App\Models\Languages;
use App\Models\Lobbies;
use App\Models\Phases;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\returnArgument;

class LobbiesController extends Controller
{
    function showLobbies()
    {
        Log::info('LobbiesController:showAlllobbies');
        return view('lobbies', ['lobbies' => $this->getLobbies()]);

    }

    function getLobbiesHTML(){
        Log::info('LobbiesController:getLobbiesHTML');
        return view('lobbies-list', ['lobbies' => $this->getLobbies()]);
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

        //TODO
    }

    /**
     * vytvoření nového lobby po zavolání routy /addLobby
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */
    function addLobby()
    {
        Log::info('LobbiesController:addLobby');

        $language = DB::table('languages')
            ->where('code', '=', '1')
            ->get();

        if(count($language) == 0) {
            return response('Nelze vytvořit lobby, jelikož není žádný jazyk označen codem 1. (Tabulka languages)', 500)->header('Content-Type', 'text/plain');
        }

        $phase = DB::table('phases')
            ->where('code', '=', '1')
            ->get();

        if(count($phase) == 0) {
            return response('Nelze vytvořit lobby, jelikož není žádná fáze hry označen codem 1. (Tabulka phases)', 500)->header('Content-Type', 'text/plain');
        }


        $lobby = new Lobbies;
        $lobby->name = 'Nové lobby';
        $lobby->difficulty = $lobby->getIdbyCode('1');
        $lobby->language = $language[0]->id;
        $lobby->created_at = Carbon::now()->toDateTimeString();
        $lobby->updated_at = Carbon::now()->toDateTimeString();
        $check = $lobby->save();

        if(!$check){
            return response('Chyba při ukládání do databáze Lobbies!', 500)->header('Content-Type', 'text/plain');
        }

    }


    function editLobby($id){

        Log::info('LobbiesController:editLobby');

        $data_lobby = Lobbies::find($id);
        $data_languages = Languages::get();
        $data_difficulties = Difficulties::get();
        $data_phases = Phases::get();


        return view('lobby-edit', [
            'lobby' => $data_lobby,
            'languages' => $data_languages,
            'difficulties' => $data_difficulties,
            'phases' => $data_phases,
        ]);

    }
}
