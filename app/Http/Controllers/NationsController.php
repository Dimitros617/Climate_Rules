<?php

namespace App\Http\Controllers;

use App\Models\Difficulties;
use App\Models\Lobbies;
use App\Models\Nations;
use App\Models\Nations_templates;
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
        Log::info('NationsController:addLobby');

        $nation = new Nations();
        $nation->lobby_id = $request->id;
        $nation->name = 'Nový národ';
        $nation->economy = 0;
        $nation->tax = 0;
        $nation->happiness = 0;
        $nation->gasses = 0;
        $nation->health = 0;
        $nation->money = 1;
        $check = $nation->save();

        if(!$check){
            return response('Chyba při ukládání do databáze Nations!', 500)->header('Content-Type', 'text/plain');
        }

    }


    function getEditNations(Request $request){

        Log::info('LobbiesController:editLobbyNations');

        $data_lobby = Lobbies::find($request->id);
        $data_users = User::get();
        $data_difficulties = Difficulties::get();
        $data_nations_template = Nations_templates::get();
        $data_nations = Nations::where('lobby_id',$request->id)->get();

        $data_nations_gas_count = 0;
        $data_tem_step = 0;

        if(count($data_nations)!=0) {
            $data_nations_gas_count = Nations::where('lobby_id', $request->id)->sum('gasses');
            Log::info(Start_step_scale::where('gas', '>=', $data_nations_gas_count)->get());
            $data_tem_step = Start_step_scale::where('gas', '>=', $data_nations_gas_count)->orderBy('gas', 'asc')->first();
        }


        return view('lobby-edit-nations-table', [
            'lobby' => $data_lobby,
            'users' => $data_users,
            'difficulties' => $data_difficulties,
            'nations_template' => $data_nations_template,
            'nations' => $data_nations,
            'count_gas' => $data_nations_gas_count,
            'temp_step' => $data_tem_step->step
        ]);

    }


    function saveNationFromTemplate(Request $request){

        Log::info('LobbiesController:saveNationFromTemplate');

        $temp = Nations_templates::find($request->id_template);


        $check = DB::table('nations')
            ->where('id', $request->id_nation)
            ->update([
                'name' => $temp->name,
                'economy' => $temp->economy,
                'tax' => $temp->tax,
                'happiness' => $temp->happiness,
                'gasses' => $temp->gasses,
                'health' => $temp->health,
                'money' => $temp->money,

            ]);


        if(!$check) {
            return response('Nastala chyba při kopírování dat do tabulky nations ', 500)->header('Content-Type', 'text/plain');
        }
    }
}
