<?php

namespace App\Http\Controllers;

use App\Models\Rounds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{
    
    /**
     * Funkce smaže záznam z tabulky obdržený v request->table a řádek s ID obdržený v request->id
     * @param Request $request = API sequest z /removeElement
     * 
     * @return [Response]
     */
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

    /**
     * Funkce upraví libovolný záznam v tabulce v DB
     * @param Request $request
     * 
     * @return [response]
     */
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
