<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{
    function removeElement(Request $request)
    {

        Log::info('ContentController:removeElement');

        //TODO - doplnit mazání závislostí na lobby - státy, uživatele, kola a pod...

        $check = DB::table($request->table)
            ->where('id', '=', $request->id)
            ->delete();

        if(!$check) {
            return response('Nastala chyba při mazání dat z tabulky: ' . $request->table, 500)->header('Content-Type', 'text/plain');
        }
    }

    function changeElement(Request $request)
    {

        Log::info('ContentController:changeElement');


        $check = DB::table($request->table)
            ->where('id', '=', $request->id)
            ->update([$request->column => $request->value]);

        if(!$check) {
            return response('Nastala chyba při editaci dat z tabulky: ' . $request->table, 500)->header('Content-Type', 'text/plain');
        }
    }
}
