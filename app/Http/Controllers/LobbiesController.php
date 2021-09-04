<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LobbiesController extends Controller
{
    function showLobbies()
    {
        Log::info('LobbiesController:showAlllobbies');
        //$data = DB::table('users')->join('permition', 'users.permition', '=', 'permition.id')->select('users.id as userId', 'users.name as userName', 'users.surname as userSurname', 'users.email as userEmail','users.nick as userNick', 'permition.id as permitionId', 'permition.name as permitionName', 'permition.possibility_read', 'permition.new_user', 'permition.edit_content', 'permition.edit_permitions')->orderBy('surname','asc')->get();
        //return view('users', ['users' => $data]);
        return view('lobbies');

    }
}
