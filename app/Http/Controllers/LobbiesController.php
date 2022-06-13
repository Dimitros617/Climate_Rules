<?php

namespace App\Http\Controllers;

use App\Models\Difficulties;
use App\Models\Languages;
use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Nation_statistic_values;
use App\Models\Nations;
use App\Models\Nations_templates;
use App\Models\Permition;
use App\Models\Phases;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\Start_step_scale;
use App\Models\Statistics_types;
use App\Models\User;
use App\Models\Users_admin_clones;
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
        Log::info(config('app.locale'));

//        Languages::setLang("cs");


        $firstUser = $this->checkUserAlone();
        if($firstUser != null){
            return $firstUser;
        }

        return view('lobbies', ['lobbies' => $this->getLobbies()]);

    }

    function getLobbiesHTML(){
        Log::info('LobbiesController:getLobbiesHTML');
        return view('lobbies-list', ['lobbies' => $this->getLobbies()]);
    }

    function checkUserAlone(){

        Log::info('LobbiesController:show->checkUserAlone');

        if(!Auth::check()){
            return null;
        }

        $count = DB::table('users')->get();

        if(count($count) == 1){
            $user = User::find(Auth::user()->id);
            if($user -> current_team_id == null) {
                $user->current_team_id = 1;
                $user->permition = Permition::getAdminId();
                $user->save();
                return view( 'first-user');
            }
        }

        return null;

    }

    function getLobbies(){

        Log::info('LobbiesController:getLobbies');
        Log::info(config('app.locale'));

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
            ->where('code', '=', config('app.locale'))
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
        Lobby_to_technologies::copyTechnologies(Lobbies::all()->last()->id);

        if(!$check){
            return response('Chyba při ukládání do tabulky Lobbies!', 500)->header('Content-Type', 'text/plain');
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

        foreach ($data_nations as $data_nation){
            $data_nation->gasses = Round_to_nation_statistics::firstValueOneStatisticOneNation(Statistics_types::getIdByCode('gasses'),$data_nation->id)->value;

        }

        $data_nations_gas_count = 0;
        $data_tem_step = 0;


        //Redundantní podmínka v NationsController:getEditNations
        if(count($data_nations)!=0) {


            //Sečtená hodnota skleníkových plynů z posledního kola všech národů přižazených do loby
            $temp = Round_to_nation_statistics::lastValueOneStatisticAllNation($id,'gasses');

            $data_nations_gas_count = Round_to_nation_statistics::countvalues( Round_to_nation_statistics::lastValueOneStatisticAllNation($id,'gasses'));

            if($data_nations_gas_count < 0){
                $data_tem_step = Start_step_scale::orderBy('step','asc')->first()->step;
            }else{
                $data_tem_step = Start_step_scale::where('gas', '<', ($data_nations_gas_count+1))->orderBy('gas', 'desc')->first()->step;
                //$data_nations_gas_count+1 v případě že to má být větší v četně
            }

            if($data_tem_step == 0){
                return response('Chyba temp step (krok) z tabulky Start step scale nemůže být 0!', 500)->header('Content-Type', 'text/plain');
            }else{
                //Pokud se jedná o novou hru (lobby phase code = 1) nová hodnota kroku se updatuje v tabulce lobby do gas_step
                if(Lobbies::find($id)->phase == 1){
                    $check = DB::table('lobbies')
                        ->where('id', $id)
                        ->update([
                            'gas_step' => $data_tem_step,
                            'updated_at' => Carbon::now()->toDateTimeString(),
                        ]);


                    if(!$check) {
                        return response('Nastala chyba při ukládání dat gas_step do tabulky lobbies! ', 500)->header('Content-Type', 'text/plain');
                    }
                }
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

        Log::info('LobbiesController:saveLobby ' .  $request->language);

        if(Lobbies::countNations($request->id) == 0 && $request->phase != Phases::getIdByCode(1)){
            return response('Nelze změnit fázy hry dokud nejsou přidáni hráči.', 500)->header('Content-Type', 'text/plain');
        }

        Log::info($request->language);

        $check = DB::table('lobbies')
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'play_date' => $request->date,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                    'phase' => $request->phase,
                    'difficulty' => $request->difficulty,
                    'language' => Languages::where("code", $request->language)->first()->id
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
            return response('Nelze vstoupit, chybí nastavit státy a hráči. Zadejte, jaké státy se této hry zúčastní, a přiřaďte patřičné hráče.', 500)->header('Content-Type', 'text/plain');
        }

        $lobby_phase = Lobbies::getLobbyPhase($lobby_id);


        if($lobby_phase->code == 1 && Auth::check() && Auth::permition()->admin != 1){
            return response('Nelze vstoupit, hra zatím nebyla spuštěna.', 500)->header('Content-Type', 'text/plain');
        }


        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }

        //Nastavení jazyka pro uživatele v lobby

        Languages::setUserLanguage($lobby_id);


        $lobby = Lobbies::find($lobby_id);
        $my_nation = Nations::find($nation_id);
        $nations = Nations::where('lobby_id',$lobby_id)->get();
        $nations = Nations::addStatsToNations($nations, Rounds::getLastRound($lobby_id)->id);
        $rounds = Rounds::where('lobby_id',$lobby_id)->get();
        $last_round = DB::table('rounds')
            ->where('lobby_id', '=', $lobby_id)
            ->orderBy('id')
            ->first();
        $last_round->gases = Lobbies::where('id',$lobby_id)->first()->actual_gasses;
        $statistics_types = DB::table('statistics_types')
            ->select('statistics_types.*')
            ->join('nation_statistic_values','statistics_types.id','=','nation_statistic_values.statistics_type_id')
            ->where('nation_statistic_values.set','=',$nations[0]->statistic_values_set)
            ->groupBy('statistics_types.code_name')
            ->orderBy('statistics_types.id')
            ->get();

        if(!Lobbies::isDefinedNationsStatisticTypesSame($lobby_id)){
            return response('Zjistily jsme že různé národy používají různé datové sady a ukazatele!', 500)->header('Content-Type', 'text/plain');
        }

        //return ['lobby' => $lobby, 'lobby_phase' => $lobby_phase, 'my_nation' => $my_nation, 'nations' => $nations, 'rounds' => $rounds, 'last_round' => $last_round];

        return view('global-status', ['lobby' => $lobby, 'lobby_phase' => $lobby_phase, 'my_nation' => $my_nation, 'nations' => $nations, 'rounds' => $rounds, 'last_round' => $last_round, 'statistics_types' => $statistics_types]);

    }
    function getEditNationStatisticTypes($nation_id){

        Log::info('LobbiesController:getEditNationStatisticTypes');

        $lobby_id = Nations::where('id', $nation_id)->first()->lobby_id;
        return $this->getLobbyNation($lobby_id,$nation_id,'local-status-table');
    }

    function getLobbyNation($lobby_id, $nation_id = null, $view = 'local-status'){

        Log::info('LobbiesController:getLobbyNation');


        if(Lobbies::countNations($lobby_id) == 0){
            return response('Nelze vstoupit, jelikož nejsou lobby přiřazení žádní hráči.', 500)->header('Content-Type', 'text/plain');
        }

        $lobby_phase = Lobbies::getLobbyPhase($lobby_id);

        if($lobby_phase->code == 1 && Auth::check() && Auth::permition()->admin != 1){
            return response('Nelze vstoupit, hra zatím nebyla spuštěna.', 500)->header('Content-Type', 'text/plain');
        }



        if($nation_id == null) {
            $nation_id = Nations::getNationIdFromLobby($lobby_id);

            if (!is_int($nation_id) && str_contains(get_class($nation_id), 'Response')) {
                return $nation_id;  //vracím response s chybou;
            }
        }else{
            if(!Nations::isNationInLobby($nation_id, $lobby_id)){
                return response('Nelze zobrazit tento formulář, požadovaný hráč není v lobby přiřazen!', 500)->header('Content-Type', 'text/plain');
            }
            $nation_id = $nation_id;
        }

        $lobby = Lobbies::find($lobby_id);
        $my_nation = Nations::find($nation_id);
        $rounds = Rounds::where('lobby_id',$lobby_id)->get();
        $last_round = Rounds::getLastRound($lobby_id);
        $my_table = Nation_statistic_values::getNationTableWithActualValues($nation_id);
        $edit_tax = Rounds::hasNationSetTaxInRound(Rounds::getLastRound($lobby_id)->id,$nation_id);

//        return $my_table;
//        default local-status view
        return view($view, [ 'my_table' => $my_table, 'lobby' => $lobby, 'lobby_phase' => $lobby_phase, 'my_nation' => $my_nation, 'rounds' => $rounds, 'last_round' => $last_round, 'edit_tax' => $edit_tax]);



    }

    /**
     * @param Request $request - ->id lobby
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */
    function removeLobby(Request $request){
        Log::info('LobbiesController:removeLobby');

        //TODO - doplnit mazání závislostí na lobby - státy, uživatele, kola a pod...



        if(!Lobby_to_technologies::removeAllTechnologies($request->id)){
            return response('Nastala chyba při mazání lobby_to_technologies!', 500)->header('Content-Type', 'text/plain');
        }
        if(!Rounds::removeAllRoundFromLobby($request->id)) {
            return response('Nastala chyba při mazání dat z rounds všech kol', 500)->header('Content-Type', 'text/plain');
        }

        $check = DB::table('lobbies')
            ->where('id', '=', $request->id)
            ->delete();

        if(!$check) {
            return response('Nastala chyba při mazání lobby.' , 500)->header('Content-Type', 'text/plain');
        }
    }

    function setUserClone(Request $request){
        Log::info('LobbiesController:setUserClone');

        $check = Users_admin_clones::addUserClone(Auth::user()->id, $request->userID, $request->lobbyId);
        Log::info($check);
        if($check == -1){
            return response('Nastala chyba při mazání záznamu pro klonování pohledu uživatele.' , 500)->header('Content-Type', 'text/plain');
        }

        if($check == 0){
            return response('Nastala chyba při vytváření záznamu pro klonování pohledu uživatele.' , 500)->header('Content-Type', 'text/plain');
        }

    }

    
    function setPhases(Request $request){
        Log::info('LobbiesController:setPhases');

        Phases::setLobbyPhase($request->lobbyId, $request->phaseId);

    }

    function changeLobbyStartTemperature(Request $request){
        Log::info('LobbiesController:changeLobbyStartTemperature');


        $check = DB::table('lobbies')
            ->where('id', $request->lobby_id)
            ->update([
                'temperature' => $request->temperature,
                'actual_gasses' => $request->gasses,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);


        if(!$check) {
            return response('Nastala chyba při ukládání dat do tabulky lobbies ', 500)->header('Content-Type', 'text/plain');
        }

    }

    function getLobbyGasStep($id){
        Log::info('LobbiesController:getLobbyGasStep');

        return Lobbies::where('id', $id)->first()->gas_step;

    }

    function getLobbyGasses($id){
        Log::info('LobbiesController:getLobbyGasses');

        return Lobbies::where('id', $id)->first()->actual_gasses;

    }

    function getLobbyTemperature($id){
        Log::info('LobbiesController:getLobbyTemperature');

        return Lobbies::where('id', $id)->first()->temperature;

    }


}
