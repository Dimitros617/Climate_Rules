<?php

namespace App\Http\Controllers;

use App\Models\Difficulties;
use App\Models\Lobbies;
use App\Models\Nation_statistic_values;
use App\Models\Nation_statistic_values_templates;
use App\Models\Nations;
use App\Models\Nations_templates;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\Start_step_scale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NationsController extends Controller
{
    function addNation(Request $request)
    {
        Log::info('NationsController:addNation');

        Nation_statistic_values::copyNationStatisticValuesFromTemplate(Nation_statistic_values_templates::first()->set, $request->id);


        $nation = new Nations();
        $nation->lobby_id = $request->id;
        $nation->name = 'Nový národ';
        $nation->statistic_values_set = Nation_statistic_values_templates::first()->set;
        $check = $nation->save();

        Round_to_nation_statistics::copyNationStatisticsFromTemplate(Nations_templates::first()->id, Nations::all()->last()->id);

        if(!$check){
            return response('Chyba při ukládání do databáze Nations!', 500)->header('Content-Type', 'text/plain');
        }

    }

    function removeNation(Request $request){

        Log::info('NationsController:removeNation');

        Nations::removeNation($request->id);

    }




    function getEditNations(Request $request){

        Log::info('NationsController:getEditNations');

        $data_lobby = Lobbies::find($request->id);
        $data_users = User::get();
        $data_difficulties = Difficulties::get();
        $data_nations_template = Nations_templates::get();
        $data_nations = Nations::where('lobby_id',$request->id)->get();

        $data_nations_gas_count = 0;
        $data_tem_step = 0;

        if(count($data_nations)!=0) {
            $data_nations_gas_count = Round_to_nation_statistics::countvalues( Round_to_nation_statistics::oneRoundOneStatisticAllNations(Rounds::getLastRound($request->id)->id,'gasses'));
            $data_tem_step = Start_step_scale::where('gas', '>=', $data_nations_gas_count)->orderBy('gas', 'asc')->first()->step;
        }


        return view('lobby-edit-nations-table', [
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
     * metoda zkopíruje nastavení nejake nations z tabulky Nations_templates do tabulky Nations k danému předem vytvořenému nation.
     *
     * @param Request $request
     * @return 200 || 500
     */
    function saveNationFromTemplate(Request $request){

        Log::info('NationsController:saveNationFromTemplate');

        $temp = Nations_templates::find($request->id_template);


        Nation_statistic_values::copyNationStatisticValuesFromTemplate($temp->statistic_values_set, Nations::find($request->id_nation)->lobby_id, true);
        Round_to_nation_statistics::copyNationStatisticsFromTemplate($request->id_template, $request->id_nation, true);

        $check = DB::table('nations')
            ->where('id', $request->id_nation)
            ->update([
                'name' => $temp->name,
                'statistic_values_set' => $temp->statistic_values_set,
            ]);


        if(!$check) {
            return response('Nastala chyba při kopírování dat do tabulky nations ', 500)->header('Content-Type', 'text/plain');
        }
    }


    /**
     * Metoda přiřadí uživatelský učet danému nations v lobby.
     * Pokud je již učet přiřazen jinému hráči v lobby, vrací se 500, jinak se zapíše do databáze.
     *
     * @param Request $request
     * @return 200 || 500
     */
    function saveNationsUser(Request $request)
    {

        Log::info('NationsController:saveNationsUser');

        $lobby_id = DB::table('nations')
            ->where('id', '=', $request->id)
            ->get()[0]->lobby_id;

        $duplicity_count = DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->where('user_id', '=', $request->value)
            ->count();

        if($duplicity_count != 0){
            return response('Tento uživatel je již přiřazen jinému hráči v tomto lobby.' . $request->table, 500)->header('Content-Type', 'text/plain');

        }

        $check = DB::table('nations')
            ->where('id', '=', $request->id)
            ->update(['user_id' => $request->value == -1 ? null : $request->value]);

        if(!$check) {
            return response('Nastala chyba při editaci dat z tabulky: ' . $request->table, 500)->header('Content-Type', 'text/plain');
        }
    }
}
