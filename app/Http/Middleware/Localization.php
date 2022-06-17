<?php

namespace App\Http\Middleware;

use App\Models\Languages;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Localization
{
    /**
     * Handle an incoming request.
     * Middleweare načte z databáze přihlášeného uživatele jaký má uložený jazyk u sebe, pokud není přihlášený nebo nemá žádný definovaný uživatel našte sedefaultní jazyk z App.php
     * Daný jazyk se poté nastaví na stránku kterou chceme načíst
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        Log::info('Middleware:Localization');

        $locale = config('app.locale');


        if(Auth::check() && Auth::user()->language != null){

            $locale =  Languages::where("id", Auth::user()->language)->first()->code;
        }

        Log::info($locale);
        app()->setLocale($locale);
        return $next($request);
    }
}
