<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Nations;
use App\Models\Phases;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\Statistics_types;
use App\Models\Technologies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{

    /**
     * Get metoda pro získání
     * @param $id = lobby ID
     * @return array pole s hodnotamy aktuálních skleníkových plynů a aktuální kolo
     */
    function updateTemperatureActualValue($id){
        Log::info('GameController:updateTemperatureActualValue');

        $gas_step = Lobbies::find($id)->gas_step;

        $round = DB::table('rounds')
            ->where('lobby_id', '=', $id)
            ->orderBy('id')
            ->first();

        return [$gas_step, $round];
    }


    /**
     * Funkce vrasí HTML s přehledovou tabulkou global-status-table
     * @param $id = ID Lobby
     * @return Response = HTML global-status-table
     */
    function updateGlobalTable($id){


        $nations = Nations::where('lobby_id',$id)->get();
        $nations = Nations::addStatsToNations($nations, Rounds::getLastRound($id)->id);
        $statistics_types = DB::table('statistics_types')
            ->select('statistics_types.*')
            ->join('nation_statistic_values','statistics_types.id','=','nation_statistic_values.statistics_type_id')
            ->where('nation_statistic_values.set','=',$nations[0]->statistic_values_set)
            ->groupBy('statistics_types.code_name')
            ->orderBy('statistics_types.id')
            ->get();

        if(!Lobbies::isDefinedNationsStatisticTypesSame($id)){
            return response('Zjistily jsme že různé národy používají různé datové sady a ukazatele!', 500)->header('Content-Type', 'text/plain');
        }

        return view('global-status-table', ['nations' => $nations, 'statistics_types' => $statistics_types]);


    }

    /**
     * Funkce u daného národa zvíší o definovaný počet definovaný statisctický ukazatel. pokud je mimo hranice vrací kod 500
     * API /increaseValue
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

    /**
     * Funkce u daného národa sníží o definovaný počet definovaný statisctický ukazatel. pokud je mimo hranice vrací kod 500
     * API /decreaseValue
     *
     * @param Request $request
     * nationID = id národa u kterého chceme změnit ukazatel
     * statisticTypeCode = statistický kod ukazatele který chceme u národa snížit
     * step = O kolik pozic chceme danou hodnotu snížit
     */
    function decreaseValue(Request $request){
        Log::info('GameController:decreaseValue');

        $res = Round_to_nation_statistics::decreaseStaticticValueOfNation($request->nationId, $request->statisticTypeCode, $request->step);

        if($res == -3){
            return response('Nastala chyba při dekrementaci, krok snížení nemůže být >=0 !', 500)->header('Content-Type', 'text/plain');
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


    /**
     * Rekurzivní funkce, pokud je $request->response == 0 Pak se vrací HTML formulář "lobby-admin-panel-new-round" pro nastavení připsání příjmu národu za kolo
     * Pokud je $request->response == 1
     * API /addRound
     * @param Request $request
     * @return Response|void
     */
    function addRound(Request $request){
        Log::info('GameController:addRound');

        $gasses_increase = Round_to_nation_statistics::countvalues( Round_to_nation_statistics::lastValueOneStatisticAllNation($request->lobby_id,'gasses')) ;

        if($request->response == 0){
            $lobby = Lobbies::find($request->lobby_id);
            $all_nations = Lobbies::getAllNationsRoundIcomeFromLobby($request->lobby_id);
            return view('lobby-admin-panel-new-round', ['lobby' => $lobby, 'all_nations' => $all_nations, 'gasses_increase' => $gasses_increase]);
        // Potvrzení dalšího kola -> nastavení věcí na konci kola a nového kola
        }else{
            // Pokud je v requestu nastavena add_income na 1 přište se státům příjem za kolo jinak ne.
            if($request->add_income == 1){
                $bank_res = BankController::payNewRoundNationsIncome($request->lobby_id);
                if(!is_int($bank_res) && str_contains( get_class($bank_res), 'Response')){
                    return $bank_res;  //vracím response s chybou;
                }
            }

            // Vytvoření nového kola
            if(!Rounds::newRound($request->lobby_id)){
                return response('Nastal problém při vytváření nového kola v lobby. ', 500)->header('Content-Type', 'text/plain');
            }

            //Změna SP o přírůstek v daném kole.
            $gass_res = Lobbies::updateActualLobbyGasses($request->lobby_id,null,$gasses_increase);
            if(!is_int($gass_res) && str_contains( get_class($gass_res), 'Response')){
                return $gass_res;  //vracím response s chybou;
            }

            //Uprava hodnoty statistických typů zdraví a nálady pro všechny národy v lobby na konci kola
            $all_nations = Lobbies::getAllNationsFromLobby($request->lobby_id);
            foreach ($all_nations as $nation){

                $happiness = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('happiness'),$nation->id)->value;

                if($happiness < 2){
                    $step = -1;
                    $flag = 'New_round_happines_under_2';
                    $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation->id,'economy',$step,$flag);

                    if ($ret != 1) {
                        if ($ret == -3) {
                            return response('Ups zadaný index posunu je mimo hranice tabulky!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -2) {
                            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -1) {
                            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == 0) {
                            Round_to_nation_statistics::setBorderStaticticValueOfNation($nation->id, 'economy', $step, $flag);
                        }
                    }

                    $step = -1;
                    $flag = 'New_round_happines_under_2';
                    $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation->id,'level_economy',$step,$flag);

                    if ($ret != 1) {
                        if ($ret == -3) {
                            return response('Ups zadaný index posunu je mimo hranice tabulky!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -2) {
                            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -1) {
                            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == 0) {
                            Round_to_nation_statistics::setBorderStaticticValueOfNation($nation->id, 'level_economy', $step, $flag);
                        }
                    }
                }

                $health = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('health'),$nation->id)->value;
                $start_health = Round_to_nation_statistics::firstValueOneStatisticOneNation(Statistics_types::getIdByCode('health'),$nation->id)->value;



                if($health < $start_health){
                    $step = -1;
                    $flag = 'New_round_health_under_start';
                    $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation->id,'happiness',$step,$flag);

                    if ($ret != 1) {
                        if ($ret == -3) {
                            return response('Ups zadaný index posunu je mimo hranice tabulky!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -2) {
                            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -1) {
                            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == 0) {
                            Round_to_nation_statistics::setBorderStaticticValueOfNation($nation->id, 'happiness', $step, $flag);
                        }
                    }

                    $step = 1;
                    $flag = 'New_round_health_under_start';
                    $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation->id,'level_happiness',$step,$flag);

                    if ($ret != 1) {
                        if ($ret == -3) {
                            return response('Ups zadaný index posunu je mimo hranice tabulky!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -2) {
                            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -1) {
                            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == 0) {
                            Round_to_nation_statistics::setBorderStaticticValueOfNation($nation->id, 'level_happiness', $step, $flag);
                        }
                    }
                }

            }
        }

    }


    /**
     * Funkce vrací počet kol v daném lobby
     * @param $lobbyID
     * @return mixed
     */
    function getCountRounds($lobbyID){
        Log::info('GameController:getRoundNumber');
        return Rounds::getCountRoundsInLobby($lobbyID);
    }

    /**
     * Funkce vrací všechny uživatelé kteří jsou přiřazeni národům v lobby
     * @param $lobbyID
     * @return \Illuminate\Support\Collection
     */
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

    /**
     * Funkce vrací všechny fáze které jsou k dispozici a označeny příznakem checked (0|1) které označují která fáze je v lobby aktuálně nastavená
     * @param $lobbyID
     * @return Phases[]|\Illuminate\Database\Eloquent\Collection
     */
    function getPhases($lobbyID){
        Log::info('GameController:getPhases');
        $phases =  Phases::all();

        foreach ($phases as $phase){

            $lobbyPhaseId = Lobbies::where('id', $lobbyID)->first()->phase;

            $phase->name = __($phase->name);
            if($phase->id == $lobbyPhaseId){
                $phase->checked = 1;
            }else{
                $phase->checked = 0;
            }
        }


        return $phases;

    }


    /**
     * Rekurzivní funkce, pokud je request-> response == 0 tak se vrací formulář (HTML) kde se dá nastavit změna daní o kolik daného státu,
     * pokud je request-> response == 1 nastaví funkce změnu daní daného státu v daném lobby
     * API call /changeNationTax
     * @param Request $request
     * @return Response|mixed|void
     */
    function changeNationTax(Request $request){
        Log::info('GameController:changeNationTax');

        $nation_id = Nations::getNationIdFromLobby($request->lobby_id);

        if (!is_int($nation_id) && str_contains(get_class($nation_id), 'Response')) {
            return $nation_id;  //vracím response s chybou;
        }

        $is_first_this_round = Rounds::hasNationSetTaxInRound(Rounds::getLastRound($request->lobby_id)->id,$nation_id);
        if($is_first_this_round==1){
            return response('V tomto období jste již daně upravily, zkuste to zase příště!', 500)->header('Content-Type', 'text/plain');
        }elseif ($is_first_this_round === null){
            return response('Hmm v tomto kole již byla daň upravena vícekrát!', 500)->header('Content-Type', 'text/plain');
        }

        if($request->response == 0){

            $before_tax = Round_to_nation_statistics::getMoveStaticticValueOfNation($nation_id,'tax',-1);

            Log::info($before_tax);
            if ($before_tax !== null && !is_int($before_tax) && str_contains(get_class($before_tax), 'Response')) {
                return $before_tax;  //vracím response s chybou;
            }

            $after_tax = Round_to_nation_statistics::getMoveStaticticValueOfNation($nation_id,'tax',1);

            if ($after_tax !== null && !is_int($after_tax) && str_contains(get_class($after_tax), 'Response')) {
                return $after_tax;  //vracím response s chybou;
            }


            $statistic_types = Lobbies::where('id', Nations::find($nation_id)->lobby_id)->select('id')->first();
            $statistic_types->economy = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('economy'),$nation_id)->value;
            $statistic_types->before_tax = $before_tax;
            $statistic_types->actual_tax = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('tax'),$nation_id)->value;
            $statistic_types->after_tax = $after_tax;
            $statistic_types->economy_icon  = Statistics_types::where('id', Statistics_types::getIdByCode('economy'))->first()->icon;
            $statistic_types->tax_icon  = Statistics_types::where('id',Statistics_types::getIdByCode('tax'))->first()->icon;
            $statistic_types->economy_name  = Statistics_types::where('id', Statistics_types::getIdByCode('economy'))->first()->name;
            $statistic_types->tax_name  = Statistics_types::where('id',Statistics_types::getIdByCode('tax'))->first()->name;

            return view('nation-edit-tax', ['statistic_types' => $statistic_types]);
        }else{

            $flag = 'Nation_tax_change';
            //Definice které statistické typi chceme upravit
            $statics_types = ['tax', 'happiness', 'level_happiness'];
            // nastavení které jsou invertované tedy které se při zvětšení odečítají. 0 = Přičíst je přičíst, 1 = negace po přičtení se hodnota změnší.
            $statics_types_inverted = [0, 1, 0];
            for ($i = 0; $i < count($statics_types); $i++) {

                $stat_type = $statics_types[$i];
                $step = Statistics_types::where('code_name', $stat_type)->first()->positive_value == 1 ? $request->tax_increase : $request->tax_increase * -1;
                $step = $statics_types_inverted[$i] == 0 ? $step : $step * -1;
                $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation_id, $stat_type, $step, $flag);

                if ($ret != 1) {
                    if ($ret == -3) {
                        return response('Ups zadaný index posunu je mimo hranice tabulky!', 500)->header('Content-Type', 'text/plain');
                    }
                    if ($ret == -2) {
                        return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                    }
                    if ($ret == -1) {
                        return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                    }
                    if ($ret == 0) {
                        Round_to_nation_statistics::setBorderStaticticValueOfNation($nation_id, $stat_type, $step, $flag);
                    }
                }
            }
        }


    }

    /**
     * Funkce změní poslané statistické tipy o daný počet
     * Voláno API /changeNationStatisticTypes
     * @param Request $request
     * @return Response|void
     */
    function changeNationStatisticTypes(Request $request){
        Log::info('GameController:changeNationStatisticTypes');

        $statistic_types = json_decode(json_encode($request->statistic_types));
        for ($i = 0; $i < count($statistic_types); $i++) {

            $stat_type = $statistic_types[$i]->statistic_type_code_name;
            $step = $statistic_types[$i]->move;
            $nation_id = $request->nation_id;
            if($statistic_types[$i]->nation_id != null){
                $nation_id = $statistic_types[$i]->nation_id;
            }

            if($nation_id == null){
                return response('Ups ID států nemůže být null!', 500)->header('Content-Type', 'text/plain');
            }
            if ($step == 0 ){
                continue;
            }
            $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation_id, $stat_type, $step, ('Manual_admin_change_global:'. Auth::user()->id));

            if ($ret != 1) {
                if ($ret == -3) {
                    return response('Ups zadaný index posunu je mimo hranice tabulky!', 500)->header('Content-Type', 'text/plain');
                }
                if ($ret == -2) {
                    return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                }
                if ($ret == -1) {
                    return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                }
                if ($ret == 0) {
                    Round_to_nation_statistics::setBorderStaticticValueOfNation($nation_id, $stat_type, $step, ('Manual_admin_change_global:'. Auth::user()->id));
                }
            }
        }

    }
}
