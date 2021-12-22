<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Nations;
use App\Models\Nations_technologies;
use App\Models\Nations_technologies_status;
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

            $nation = Lobbies::getAdminNation($lobby_id);

            if(is_numeric($nation) && $nation == -1){
                return response('Nelze vstoupit, nebyl tvémů účtu přiřazen žádný hráč v této hře!', 500)->header('Content-Type', 'text/plain');
            }

            if(is_numeric($nation) && $nation == -2){
                return response('Nelze vstoupit, tvémů účtu je přiřazeno více hráčů!', 500)->header('Content-Type', 'text/plain');
            }

            $nation_id = $nation->id;

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
        //return $my_nation;

            //TODO předat data z databáze - status technologi
        return view('technologies', ['lobby' => $lobby, 'my_nation' => $my_nation, 'allTechnologies' => $allTechnologies]);
    }

    /**
     * Funkce změní stav technologie pro konkrétní stát. Zkontorluje zda je zapoetřebí certifikace
     * @param Request $request - Request->technology_id = id technologie které chceme pro daný stát změnit
     *
     */
    function changeNationToTechnologyStatus(Request $request){

        Log::info('TechnologiController:changeNationToTechnologyStatus');


        $lobby_id = Lobby_to_technologies::find($request->technology_id)->lobby_id;

        if(Auth::check() && Auth::permition()->admin == 1){

            $nation = Lobbies::getAdminNation($lobby_id);

            if(is_numeric($nation) && $nation == -1){
                return response('Nelze vstoupit, nebyl tvémů účtu přiřazen žádný hráč v této hře!', 500)->header('Content-Type', 'text/plain');
            }

            if(is_numeric($nation) && $nation == -2){
                return response('Nelze vstoupit, tvémů účtu je přiřazeno více hráčů!', 500)->header('Content-Type', 'text/plain');
            }

            $nation_id = $nation->id;

        }else{


            $nation = Lobbies::getMyNation($lobby_id);

            if( is_numeric($nation) && $nation == -1){
                return response('Nelze vstoupit, nebyl tvémů účtu přiřazen žádný hráč v této hře!', 500)->header('Content-Type', 'text/plain');
            }

            if(is_numeric($nation) && $nation == -2){
                return response('Nelze vstoupit, tvémů účtu je přiřazeno více hráčů!', 500)->header('Content-Type', 'text/plain');
            }

            $nation_id = $nation->id;
        }


        $status = Nations_technologies::getOneNationStatusOfTechnology($nation_id, $request->technology_id);



        if(count($status)==0){
            if(!Nations_technologies::addNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('buy'))){
                return response('Chyby při vytváření nového záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }
            return Nations_technologies_status::find(Nations_technologies_status::getIdByCode('buy'));
        }

        $status = $status[0];

        if ($status->code == 'new'){

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('buy'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }
            return Nations_technologies_status::find(Nations_technologies_status::getIdByCode('buy'));

        }elseif ($status->code == 'buy'){

            Log::info('---');


            if(Auth::permition()->admin !=1){
                return response('Ups, Na schválení nemáte dostatečná oprávnění!', 500)->header('Content-Type', 'text/plain');
            }

            if(Lobby_to_technologies::isTechnologyCertificated($request->technology_id)){
                $new_code = "investment";
            }else{
                $new_code = "active";
            }

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode($new_code))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }

            //TODO activate technology
            return Nations_technologies_status::find(Nations_technologies_status::getIdByCode($new_code));

        }elseif ($status->code == 'investment'){

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('certificate'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }
            return Nations_technologies_status::find(Nations_technologies_status::getIdByCode('certificate'));

        }elseif ($status->code == 'certificate'){

            if(Auth::permition()->admin !=1){
                return response('Ups, Na schválení nemáte dostatečná oprávnění!', 500)->header('Content-Type', 'text/plain');
            }

            if(!Nations_technologies::setNationStatus($request->technology_id, $nation_id, Nations_technologies_status::getIdByCode('active'))){
                return response('Chyby při úpravě záznamu v nations_technologies!', 500)->header('Content-Type', 'text/plain');
            }

            //TODO activate technology
            return Nations_technologies_status::find(Nations_technologies_status::getIdByCode('active'));

        }elseif ($status->code == 'active'){

            return response('Tuto technologii máš již aktivovanou!', 500)->header('Content-Type', 'text/plain');

        }


    }
}
