<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Round_to_nation_statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Livewire\Response;

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

        $nation = response('Nelze vstoupit, tvémů clonovanému účtu je přiřazeno více hráčů! Odstranili jsme clonované účty, zkuste to znovu a předělíme Vám nový clon účet.', 500)->header('Content-Type', 'text/plain');

        if(str_contains( get_class($nation), 'Response')){

            return 'yes';
        }
        return'NO';
    }


}
