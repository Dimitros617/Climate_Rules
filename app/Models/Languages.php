<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Languages extends Model
{
    use HasFactory;

        // public static function setLang($locale)
        // {
        //     Log::info('Languages:setLang');


        //     if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        //         app()->setLocale($locale);
        //         session()->put('locale', $locale);
        //     }

        //     Log::info(config('app.locale'));

        // }

        public static function setUserLanguage($lobbyId){
            
            Log::info('Languages:setUserLanguage');

            $check = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'language' => Lobbies::where("id", $lobbyId)->first()->language,

            ]);

            if($check){
                return 1;
            }else{
                return response('Nepodařilo se upravit data v databázi, tabulka Users!', 500)->header('Content-Type', 'text/plain');

            }

        }



}
