<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;


class LanguageController extends Controller
{
   public function switchLang($lang)
   {
       Log::info('LanguageController:switchLang');
       Log::info($lang);
       Log::info(Config::get('languages'));
       Log::info(config('app.locale'));


        $users = DB::table('users')->get();


        foreach($users as $user){
            $check = DB::table('users')
            ->where('id', $user->id)
            ->update([
                'language' => Languages::where('code', $lang)->first()->id,
            ]);
        }



       return "set: " . $lang;
   }


}
