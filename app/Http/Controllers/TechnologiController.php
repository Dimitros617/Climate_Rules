<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Nations;
use App\Models\Nations_technologies;
use App\Models\Nations_technologies_status;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\Statistics_types;
use App\Models\Technologies;
use App\Models\Technologies_statistics_types_changes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TechnologiController extends Controller
{
    function show($lobby_id){

        Log::info('TechnologiController:show');

        return $this->getTechnologiView('technologies', $lobby_id);
    }

    function getTechnologiView($view_name, $lobby_id){

        Log::info('TechnologiController:show->getTechnologiView');

        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }


        $allTechnologies = Lobby_to_technologies::getAlltechnologiesFromLobby($lobby_id);
        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);
        $roundNumber = Rounds::getCountRoundsInLobby($lobby_id);
        $statistics_types = DB::table('statistics_types')
            ->select('statistics_types.*')
            ->join('nation_statistic_values','statistics_types.id','=','nation_statistic_values.statistics_type_id')
            ->where('nation_statistic_values.set','=',$my_nation->statistic_values_set)
            ->groupBy('statistics_types.code_name')
            ->orderBy('statistics_types.id')
            ->get();

        $branches = DB::table('branches')->get();
        $areas = DB::table('technologies_areas')->get();

        //return $statistics_types;
        //return $allTechnologies;
        //return $my_nation;

        return view($view_name, ['lobby' => $lobby, 'roundNumber' => $roundNumber, 'my_nation' => $my_nation, 'allTechnologies' => $allTechnologies, 'statistics_types' => $statistics_types, 'branches' => $branches, 'areas' => $areas]);

    }

    /**
     * Funkce změní stav technologie pro konkrétní stát. Zkontorluje zda je zapoetřebí certifikace
     * @param Request $request - Request->technology_id = id technologie které chceme pro daný stát změnit
     *
     */
    function changeNationToTechnologyStatus(Request $request){

        Log::info('TechnologiController:changeNationToTechnologyStatus');


        $lobby_id = Lobby_to_technologies::find($request->technology_id)->lobby_id;

        $nation_id = Nations::getNationIdFromLobby($lobby_id, $request->nation_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }


        $status = Nations_technologies::getOneNationStatusOfTechnology($nation_id, $request->technology_id);



        if(count($status)==0){
            if(!Nations_technologies::addNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('buy'))){
                return response('Chyby při vytváření nového záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }
            return $this->getTechnologiView('technologies-box', $lobby_id);
        }

        $status = $status[0];

        if ($status->code == 'new'){

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('buy'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }
            return $this->getTechnologiView('technologies-box', $lobby_id);

        }elseif ($status->code == 'buy'){


            if(Auth::permition()->admin !=1){
                return response('Ups, Na schválení nemáte dostatečná oprávnění!', 500)->header('Content-Type', 'text/plain');
            }

            if(Lobby_to_technologies::isTechnologyCertificated($request->technology_id)){
                $new_code = "investment";
            }else{
                $new_code = "active";

                $activate_technology = $this->activateTechnologyToNation($request->technology_id, $nation_id);
                if($activate_technology != 1){
                    return $activate_technology;
                }
            }

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode($new_code))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }


            return $this->getTechnologiView('technologies-box', $lobby_id);

        }elseif ($status->code == 'investment'){

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('certificate'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }
            return $this->getTechnologiView('technologies-box', $lobby_id);

        }elseif ($status->code == 'certificate'){

            if(Auth::permition()->admin !=1){
                return response('Ups, Na schválení nemáte dostatečná oprávnění!', 500)->header('Content-Type', 'text/plain');
            }

            $activate_technology = $this->activateTechnologyToNation($request->technology_id, $nation_id);

            if($activate_technology != 1){
                return $activate_technology;
            }

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('active'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }

            return $this->getTechnologiView('technologies-box', $lobby_id);

        }elseif ($status->code == 'active'){

            return response('Tuto technologii máš již aktivovanou!', 500)->header('Content-Type', 'text/plain');

        }


    }


    /**
     * Funkce upraví statistiky státu podle karty technologie kterou chceme aktivovat.
     * @param $technology_id - id from lobby_to_technologies
     * @param $nation_id - id naroda z lobby
     * @return Response nebo 1 pokud je vše OK a aktivace proběhla v pořádku
     */
    function activateTechnologyToNation($technology_id, $nation_id){

        Log::info('TechnologyController:activateTechnologyToNation');


        $technology_statistic_change = Technologies_statistics_types_changes::where('technology_id', Lobby_to_technologies::find($technology_id)->technology_id)->get();

        if(count($technology_statistic_change)==0){
            return response('Ups, nelze najít technology_statistics_types_changes dané technologie: ' . $technology_id, 500)->header('Content-Type', 'text/plain');
        }

        foreach ($technology_statistic_change as $tech_stat){

                $statistic_code = Statistics_types::find($tech_stat->statistic_type_id)->code_name;
                $level_code = false;
                do {

                    $flag = 'Technology - ' . Technologies::find(Lobby_to_technologies::find($technology_id)->technology_id)->name;
                    $ret = Round_to_nation_statistics::changeStatisticValueOfNation($nation_id, $statistic_code, $tech_stat->index_move, $flag);


                    if ($ret != 1) {
                        if ($ret == -3) {
                            return response('Ups zadaný index posunu nemůže být záporný!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -2) {
                            return response('Nastala chyba při Ukládání nového záznamu do tabulky roun_to_nation_statistics!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == -1) {
                            return response('Nastala chyba při hledání aktuální hodnoty který je nastavená v tabulce nation_statistics_values. Aktuální hodnota nenalezena!', 500)->header('Content-Type', 'text/plain');
                        }
                        if ($ret == 0) {
                            $temp_flag = $tech_stat->index_move > 0 ? 'max' : 'min';
                            $flag = 'Technology - ' . $temp_flag . ' - ' . Technologies::find(Lobby_to_technologies::find($technology_id)->technology_id)->name;
                            Round_to_nation_statistics::setBorderStaticticValueOfNation($nation_id, $statistic_code, $tech_stat->index_move, $flag);
                        }
                    }

                    if(!str_contains($statistic_code, 'level_') && Statistics_types::existLevelCode($statistic_code)){
                        $level_code = true;
                        $statistic_code = 'level_'.$statistic_code;
                    }else{
                        $level_code = false;
                    }

                }while($level_code);

        }

        return 1;
    }

    public function changeTechnologyParameter(Request $request){

        Log::info('TechnologyController:changeTechnologyParameter');


        $check = DB::table('lobby_to_technologies')
            ->where('id', $request->technology_id)
            ->update([
                $request->parameter => $request->value,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);


        if(!$check) {
            return response('Nastala chyba při aktualizaci dat v tabulce lobby_to_technologies ', 500)->header('Content-Type', 'text/plain');
        }
    }

}
