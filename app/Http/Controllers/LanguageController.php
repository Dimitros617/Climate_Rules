<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

class LanguageController extends Controller
{
//    public function switchLang($lang)
//    {
//        Log::info('LanguageController:switchLang');
//        Log::info($lang);
//        Log::info(Config::get('languages'));
//        Log::info(config('app.locale'));
//
//
//        //Kontroluje soubor languages.php ve složce Config
//        if (array_key_exists($lang, Config::get('languages'))) {
//            Session::put('applocale', $lang);
//            app()->setLocale($lang);
//        }
//        Log::info(config('app.locale'));
//
//        return Redirect::back();
//    }


}
