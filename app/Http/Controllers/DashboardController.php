<?php

namespace App\Http\Controllers;

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

        $all_img = Storage::disk('technology-img')->allFiles();

        for ($i = 0 ; $i < count($all_img); $i++){
            $all_img[$i] = '/Img/technology-img/' . $all_img[$i];
        }

        $all_assigned_img = Technologies::where('img_url', '!=', '/Img/logo_mini_transparent_gray.png')->where('img_url', 'not like', '%/Img/technology-img/%')->groupBy('img_url')->get();

        foreach ($all_assigned_img as $img){
            array_push($all_img, $img->img_url);
        }

        return $all_img;

    }


}
