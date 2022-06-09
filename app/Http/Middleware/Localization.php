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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        Log::info('Middleware:Localization');

        $locale = config('app.locale');
        

        if(Auth::user()->language != null){

            $locale =  Languages::where("id", Auth::user()->language)->first()->code;
        }

        Log::info($locale);
        app()->setLocale($locale);
        return $next($request);
    }
}
