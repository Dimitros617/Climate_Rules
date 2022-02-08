<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Money_transaction_types;
use App\Models\Nations;
use App\Models\Nations_money_balances;
use App\Models\Nations_technologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{
    function show($lobby_id){

        Log::info('BankController:show');

        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }

        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);
        $my_payment_balance = Nations_money_balances::getAllNationTransaction($nation_id);
        $technology_value = Nations_technologies::getValueOfAllMyTechnologies($nation_id);


        return view('bank', ['lobby' => $lobby, 'my_nation' => $my_nation, 'my_payment_balance' => $my_payment_balance, 'technology_value' => $technology_value]);
;
    }

    function getOnePayForm($lobby_id){

        Log::info('BankController:getOnePayForm');

        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }

        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);
        $allNations = Lobbies::getAllNationsFromLobby($lobby_id);


        return view('bank-one-pay', ['lobby' => $lobby, 'my_nation' => $my_nation, 'allNations' => $allNations]);
        ;
    }

    function addOnePay(Request $request){

        Log::info('BankController:addOnePay');

        $bank_res = BankController::payAmount($request->amouth,$request->nation_id_from, $request->nation_id_to,'One-pay:'.$request->admin_pay, Money_transaction_types::getIdByCode('common_pay'), $request->admin_pay, $request->description);

        if(!is_int($bank_res) && str_contains( get_class($bank_res), 'Response')){
            return $bank_res;  //vracím response s chybou;
        }

    }

    public static function payAmount($amount, $nation_id_from, $nation_id_to, $flag, $transaction_type_id, $admin_pay = 0, $description = null){

        Log::info('BankController:payAmount');


        if($admin_pay == 1){
            //Ověření zda má uživatel oprávnění na admin platbu
            if(Auth::check() && Auth::permition()->admin != 1){
                return response('Dobrý pokus, ale na tohle nemáš dostatečná oprávnění!', 500)->header('Content-Type', 'text/plain');
            }
            //Není příjemce admin - Admin posílá peníze hráči
            if($nation_id_to != null){
                $nationsMoney = Nations::find($nation_id_to)->money;
                Nations::find($nation_id_to)->update(['money' => $nationsMoney + $amount]);
                if(!Nations_money_balances::addTransactionRecord($amount, null, $nation_id_to, $flag, $description, $transaction_type_id)){
                    return response('Peníze jsme převedly, ale nepovedlo se nám udělat záznam o transakci.', 500)->header('Content-Type', 'text/plain');
                }
            }
            //Admin posílá adminovy -> nic se neděje
            else{
                if(!Nations_money_balances::addTransactionRecord($amount, $nation_id_from, $nation_id_to, $flag, $description, $transaction_type_id)){
                    return response('Peníze jsme převedly, ale nepovedlo se nám udělat záznam o transakci.', 500)->header('Content-Type', 'text/plain');
                }
            }

        }else{

            //Hráč posílá peníze adminovy
            if($nation_id_to == null && $nation_id_from != null) {
                $nationsFromMoney = Nations::find($nation_id_from)->money;
                if ($nationsFromMoney >= $amount) {
                    Nations::find($nation_id_from)->update(['money' => ($nationsFromMoney - $amount)]);
                    if(!Nations_money_balances::addTransactionRecord($amount, $nation_id_from, $nation_id_to, $flag, $description, $transaction_type_id)){
                        return response('Peníze jsme převedly, ale nepovedlo se nám udělat záznam o transakci.', 500)->header('Content-Type', 'text/plain');
                    }
                }else{
                    return response('Na tuto transakci nemáš dost finančních prostředků.', 500)->header('Content-Type', 'text/plain');
                }
            }

            //Hráč posílá hráci
            if($nation_id_to != null && $nation_id_from != null) {
                $nationsFromMoney = Nations::find($nation_id_from)->money;
                $nationsToMoney = Nations::find($nation_id_to)->money;

                if ($nationsFromMoney >= $amount) {
                    Nations::find($nation_id_from)->update(['money' => $nationsFromMoney - $amount]);
                    Nations::find($nation_id_to)->update(['money' => $nationsToMoney + $amount]);
                    if(!Nations_money_balances::addTransactionRecord($amount, $nation_id_from, $nation_id_to, $flag, $description, $transaction_type_id)){
                        return response('Peníze jsme převedly, ale nepovedlo se nám udělat záznam o transakci.', 500)->header('Content-Type', 'text/plain');
                    }
                }else{
                    return response('Na tuto transakci nemáš dost finančních prostředků.', 500)->header('Content-Type', 'text/plain');
                }
            }
        }

        return 1;

    }
}
