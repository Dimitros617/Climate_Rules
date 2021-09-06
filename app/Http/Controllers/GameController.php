<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    function updateTemperatureActualValue($id){
        Log::info('ListUsersController:showAllUsers');

        $gas_step = Lobbies::find($id)->gas_step;

        $round = DB::table('rounds')
            ->where('lobby_id', '=', $id)
            ->orderBy('id')
            ->first();

        return [$gas_step, $round];
    }
}
