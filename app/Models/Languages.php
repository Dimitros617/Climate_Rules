<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Languages extends Model
{
    use HasFactory;

    public static function setLang($locale)
    {
        Log::info('Languages:setLang');


        if (isset($locale) && in_array($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
        }

        Log::info(config('app.locale'));

    }
}
