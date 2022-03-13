<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LobbyEntry
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

        Log::info('middleware-LobbyEntry');

        if(!Auth::check()){
            return response('Tuto akci nelze provést, musíte se nejprve přihlásit!' . $request->table, 500)->header('Content-Type', 'text/plain');
        }

        if(Auth::permition()->admin == 1){
            return $next($request);
        }

        $count = DB::table('nations')
            ->where('lobby_id', '=', $request->lobby_id)
            ->where('user_id', '=', Auth::user()->id)
            ->count();

        if($count == 0){
            return response('Do této hry nemáte přístup, váš účet není přižazen žádnému státu ve hře!' . $request->table, 500)->header('Content-Type', 'text/plain');
        }else{
            return $next($request);
        }


    }
}
