<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\Round_to_nation_statistics;
use App\Models\Technologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Response;
use Pusher\Pusher;

class DashboardController extends Controller
{
    function show()
    {

        Log::info('DashboardControler:show');

        return view('dashboard');

    }

    function checkUserAlone(){

        Log::info('DashboardControler:show->checkUserAlone');

        $count = DB::table('users')->get();

        if(count($count) == 1){
            $user = User::find(Auth::user()->id);
            if($user -> current_team_id == null) {
                $user->current_team_id = 1;
                $user->permition = 3;
                $user->save();
                return view( 'first-user');
            }
        }

        return null;

    }

    function showHelp(){

        return view( 'dashboard');

    }

    function helpTest(){

        Log::info('YES');

        $pusher = new Pusher(
            "c043d5fc6c72a5abf31f",
            "d3c5e9be3da1fdf6c7fc",
            "1343195",
            array('cluster' => 'eu')
        );

        $pusher->trigger('my-channel', 'my-event', array('message' => 'hello worldddd'));


    }


}
