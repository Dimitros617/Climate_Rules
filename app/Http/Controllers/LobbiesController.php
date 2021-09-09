<?php

namespace App\Http\Controllers;

use App\Models\Difficulties;
use App\Models\Languages;
use App\Models\Lobbies;
use App\Models\Nations;
use App\Models\Nations_templates;
use App\Models\Phases;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\Start_step_scale;
use App\Models\User;
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
        $lobby->phase = $phase[0]->id;
        $lobby->created_at = Carbon::now()->toDateTimeString();
        $lobby->updated_at = Carbon::now()->toDateTimeString();
        $check = $lobby->save();

        Rounds::newRound(Lobbies::all()->last()->id);

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

    /**
     * Funkce našte data o všech nations které jsou přiděleny k tomuto lobby, zkontroluje a spočítá počáteční hodnoty hranice zvýšení teploty podle aktuálního stavu nations
     * Když nejsou lobby přiděleny žádné nations, vrací 0
     *
     * @param $id = ID lobby které chceem upravovat
     * @return lobby-edit-nations blade
     */
    function editLobbyNations($id){

        Log::info('LobbiesController:editLobbyNations');

        $data_lobby = Lobbies::find($id);
        $data_users = User::get();
        $data_difficulties = Difficulties::get();
        $data_nations_template = Nations_templates::get();
        $data_nations = Nations::where('lobby_id',$id)->get();



        $data_nations_gas_count = 0;
        $data_tem_step = 0;

        if(count($data_nations)!=0) {


            $data_nations_gas_count = Round_to_nation_statistics::countvalues( Round_to_nation_statistics::oneRoundOneStatisticAllNations(Rounds::getLastRound($id)->id,'gasses'));

            if($data_nations_gas_count < 0){
                $data_tem_step = Start_step_scale::orderBy('step','asc')->first()->step;
            }else{
                $data_tem_step = Start_step_scale::where('gas', '<', ($data_nations_gas_count+1))->orderBy('gas', 'desc')->first()->step;

            }
        }

        return view('lobby-edit-nations', [
            'lobby' => $data_lobby,
            'users' => $data_users,
            'difficulties' => $data_difficulties,
            'nations_template' => $data_nations_template,
            'nations' => $data_nations,
            'count_gas' => $data_nations_gas_count,
            'temp_step' => $data_tem_step
        ]);

    }

    /**
     * Metoda převezme requestem data o nastavení lobby a samotné hry a uloží jej do databáze
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */
    function saveLobby(Request $request){

        Log::info('LobbiesController:saveLobby');


        $check = DB::table('lobbies')
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'play_date' => $request->date,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                    'phase' => $request->phase,
                    'difficulty' => $request->difficulty,
                    'language' => $request->language,
                ]);


        if(!$check) {
            return response('Nastala chyba při ukládání dat do tabulky lobbies ', 500)->header('Content-Type', 'text/plain');
        }
    }

    //Inside game


    /**
     *
     * metoda vrací stránku se hrou, pokud je člověk admin, vrátí mu to první národ, jinak se vrací pouze ten národ, který je přiřazen k danému učtu v loby
     * @param $lobby_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function enterLobby($lobby_id){

        Log::info('LobbiesController:enterLobby');


        if(Lobbies::countNations($lobby_id) == 0){
            return response('Nelze vstoupit, jelikož nejsou lobby přiřazení žádní hráči.', 500)->header('Content-Type', 'text/plain');
        }

        $lobby_phase = Lobbies::getLobbyPhase($lobby_id);


        if(Auth::check() && Auth::permition()->admin == 1){

            $nation_id = Lobbies::getFirstNation($lobby_id)->id;

        }else{

            if($lobby_phase->code == 1){
                return response('Nelze vstoupit, hra zatím nebyla spuštěna.', 500)->header('Content-Type', 'text/plain');
            }

            $nation = Lobbies::getMyNation($lobby_id);

            if($nation == -1){
                return response('Nelze vstoupit, nebyl tvémů účtu přiřazen žádný hráč v této hře!', 500)->header('Content-Type', 'text/plain');
            }

            if($nation == -2){
                return response('Nelze vstoupit, tvémů účtu je přiřazeno více hráčů!', 500)->header('Content-Type', 'text/plain');
            }

            $nation_id = $nation->id;
        }

        $lobby = Lobbies::find($lobby_id);
        $my_nation = Nations::find($nation_id);
        $nations = Nations::where('lobby_id',$lobby_id)->get();
        $rounds = Rounds::where('lobby_id',$lobby_id)->get();
        $last_round = DB::table('rounds')
            ->where('lobby_id', '=', $lobby_id)
            ->orderBy('id')
            ->first();


        return view('global-status', ['lobby' => $lobby, 'lobby_phase' => $lobby_phase, 'my_nation' => $my_nation, 'nations' => $nations, 'rounds' => $rounds, 'last_round' => $last_round]);

    }

    function getLobbyNation($lobby_id, $nation_id = null){

        Log::info('LobbiesController:enterLobbyNation');

//        if($nation_id == null){
//            // pouze přiřazený stát hráči
//        }else{
//            //admin - stát podle ID -> $nation_id
//        }


        if(Lobbies::countNations($lobby_id) == 0){
            return response('Nelze vstoupit, jelikož nejsou lobby přiřazení žádní hráči.', 500)->header('Content-Type', 'text/plain');
        }

        $lobby_phase = Lobbies::getLobbyPhase($lobby_id);


        if(Auth::check() && Auth::permition()->admin == 1){

            if($nation_id == null){
                $nation_id = Lobbies::getFirstNation($lobby_id)->id;
            }

        }else{

            if($lobby_phase->code == 1){
                return response('Nelze vstoupit, hra zatím nebyla spuštěna.', 500)->header('Content-Type', 'text/plain');
            }

            $nation = Lobbies::getMyNation($lobby_id);

            if($nation == -1){
                return response('Nelze vstoupit, nebyl tvémů účtu přiřazen žádný hráč v této hře!', 500)->header('Content-Type', 'text/plain');
            }

            if($nation == -2){
                return response('Nelze vstoupit, tvémů účtu je přiřazeno více hráčů!', 500)->header('Content-Type', 'text/plain');
            }

            $nation_id = $nation->id;
        }

        $lobby = Lobbies::find($lobby_id);
        $my_nation = Nations::find($nation_id);
        $nations = Nations::where('lobby_id',$lobby_id)->get();
        $rounds = Rounds::where('lobby_id',$lobby_id)->get();
        $last_round = DB::table('rounds')
            ->where('lobby_id', '=', $lobby_id)
            ->orderBy('id')
            ->first();


        return view('local-status', ['lobby' => $lobby, 'lobby_phase' => $lobby_phase, 'my_nation' => $my_nation, 'nations' => $nations, 'rounds' => $rounds, 'last_round' => $last_round]);



    }


}
