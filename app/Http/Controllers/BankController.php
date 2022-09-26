<?php

namespace App\Http\Controllers;

use App\Models\Lobbies;
use App\Models\Lobby_to_technologies;
use App\Models\Money_transaction_types;
use App\Models\Nations;
use App\Models\Nations_money_balances;
use App\Models\Nations_technologies;
use App\Models\Round_to_nation_statistics;
use App\Models\Rounds;
use App\Models\Statistics_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{


    /**
     * Funkce načte všechny informace pro stránku banky a vytvoří HTML nutné zadat lobby ID poté se automaticky načte Nation ID
     *
     * @param mixed $lobby_id
     *
     * @return [view] HTML se stránkou banky
     */
    function show($lobby_id){

        Log::info('BankController:show');

        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }

        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);
        $my_payment_balance = Nations_money_balances::getAllNationTransaction($nation_id);
        $admin_payment_balance = Nations_money_balances::getAllNationTransaction(null, $lobby_id);
//        return $my_payment_balance;
        $technology_value = Nations_technologies::getValueOfAllMyTechnologies($nation_id);
        $edit_tax = Rounds::hasNationSetTaxInRound(Rounds::getLastRound($lobby_id)->id,$nation_id);
        $allNations = Lobbies::getAllNationsFromLobby($lobby_id);
        $allTransactionTypes = Money_transaction_types::all();
        $allTechnologyValue = Lobby_to_technologies::getAllPriceOfTechnology($lobby_id);

        $actual_economy = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('economy'),$nation_id)->value;
        $actual_tax = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('tax'),$nation_id)->value;
        $next_round_icome = $actual_economy * $actual_tax;

        return view('bank', ['lobby' => $lobby, 'my_nation' => $my_nation, 'my_payment_balance' => $my_payment_balance, 'admin_payment_balance' => $admin_payment_balance, 'technology_value' => $technology_value, 'edit_tax' => $edit_tax, 'next_round_icome' => $next_round_icome, 'allNations' => $allNations, 'allTransactionTypes' => $allTransactionTypes, 'allTechnologyValue' => $allTechnologyValue]);
;
    }

    /**
     * Funkce vrací HTML formulář pro poslání jednorázové platby poté se automaticky načte Nation ID
     * @param mixed $lobby_id
     *
     * @return [view] HTML se stránkou pro zobrazení v popUp
     */
    function getOnePayForm($lobby_id){

        Log::info('BankController:getOnePayForm');

        $nation_id = Nations::getNationIdFromLobby($lobby_id);

        if(!is_int($nation_id) && str_contains( get_class($nation_id), 'Response')){
            return $nation_id;  //vracím response s chybou;
        }

        $my_nation = Nations::find($nation_id);
        $lobby = Lobbies::find($lobby_id);
        $allNations = Lobbies::getAllNationsFromLobby($lobby_id);
        $allTransactionTypes = Money_transaction_types::all();

        return view('bank-one-pay', ['lobby' => $lobby, 'my_nation' => $my_nation, 'allNations' => $allNations, 'allTransactionTypes' => $allTransactionTypes]);
        ;
    }



    /**
     *
     * @param Request $request
     *
     * @return [Response] = 200 nebo 500
     */
    function addMultiplePay(Request $request){

        Log::info('BankController:addOnePay');

        $nations_id_to = explode(",", $request->nations_id_to);

        foreach ($nations_id_to as $nation_id_to) {
            if($nation_id_to == ""){
                continue;
            }
            $request->nation_id_to = $nation_id_to;
            $bank_res = BankController::addOnePay($request);
            if(!is_int($bank_res) && str_contains( get_class($bank_res), 'Response')){
                return $bank_res;  //vracím response s chybou;
            }
        }



    }

    /**
     *
     * @param Request $request
     *
     * @return [Response] = 200 nebo 500
     */
    function addOnePay(Request $request){

        Log::info('BankController:addOnePay');

        $bank_res = BankController::payAmount($request->amouth,$request->nation_id_from, $request->nation_id_to,'One-pay:'.$request->admin_pay, Money_transaction_types::getIdByCode($request->transactionType), $request->admin_pay, $request->description);

        if(!is_int($bank_res) && str_contains( get_class($bank_res), 'Response')){
            return $bank_res;  //vracím response s chybou;
        }else{
            return 1;
        }

    }

    /**
     * Funkce provede platbu či jiné transakce mezi subjekty (nations nebo admin)
     * @param mixed $amount [int] = Hodnota kterou chceme převést
     * @param mixed $nation_id_from [int] = ID národa od kterého chceme peníze převést (Může být null pro převedení od admina, peníze se prostě vytvoří)
     * @param mixed $nation_id_to [int] = ID národa komu chceme poslat peníze  (Může být null pro převedení pro admina, peníze se prostě zničí)
     * @param mixed $flag [string] = interní záznam do databáze kdo a proč transakci udělal (String)
     * @param mixed $transaction_type_id [int] = Id tansakce k platbě z tabulky Transaction_types
     * @param int $admin_pay [int] = Hodnota 1 pokud se jedná o platbu kterou provádí administrátor či 0 defatulně nastavená pokud ne
     * @param null $description [string] = popisek k platbě zadaná uživatelem
     *
     * @return [1 nebo Response]
     */
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
                Log::info('ssss');
            }
            //Admin posílá adminovy -> nic se neděje
            else{
                if(!Nations_money_balances::addTransactionRecord($amount, $nation_id_from, $nation_id_to, $flag, $description, $transaction_type_id)){
                    return response('Peníze jsme převedly, ale nepovedlo se nám udělat záznam o transakci.', 500)->header('Content-Type', 'text/plain');
                }
            }

        }else{

            //Hráč posílá peníze adminovy

            if($nation_id_to == "null"){
                $nation_id_to = null;
            }
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

    /**
     * Funkce  automaticky přičte všem státům v lobby příjem (round_income)
     * @param mixed $lobby_id
     *
     * @return [1 nebo Response]
     */
    public static function payNewRoundNationsIncome($lobby_id){
        $nations = Lobbies::getAllNationsRoundIcomeFromLobby($lobby_id);

        foreach ($nations as $nation){
            $bank_res = BankController::payAmount($nation->round_income,null,$nation->id,('new_round_'.Rounds::getCountRoundsInLobby($lobby_id)),Money_transaction_types::getIdByCode('common_pay'),1,('Platba za ' . Rounds::getCountRoundsInLobby($lobby_id) . ' období'));
            if(!is_int($bank_res) && str_contains( get_class($bank_res), 'Response')){
                return $bank_res;  //vracím response s chybou;
            }
        }

        return 1;
    }

}
