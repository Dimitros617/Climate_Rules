<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Nations_money_balances extends Model
{
    use HasFactory;

    public static function addTransactionRecord($amount, $nation_id_from, $nation_id_to, $flag, $description = null, $transaction_type){

        Log::info('Nations_money_balances:addTransactionRecord');

        Log::info(gettype($amount));
        Log::info($amount);
        Log::info(gettype($nation_id_from));
        Log::info($nation_id_from);
        Log::info(gettype($nation_id_to));
        Log::info($nation_id_to);
        Log::info(gettype($flag));
        Log::info($flag);
        Log::info(gettype($description));
        Log::info($description);
        Log::info(gettype($transaction_type));
        Log::info($transaction_type);

        $record = new Nations_money_balances;
        $record->nation_id_to  = $nation_id_to;
        $record->nation_id_from  = $nation_id_from;
        $record->transaction_type  = $transaction_type;
        $record->money_change = $amount;
        $record->description = $description;
        $record->reason = $flag;

        $record->created_at = Carbon::now()->toDateTimeString();
        $record->updated_at = Carbon::now()->toDateTimeString();
        return $record->save();

    }

    public static function getAllNationTransaction($nation_id){

        $ret = DB::table('nations_money_balances')
            ->Join('money_transaction_types', 'nations_money_balances.transaction_type', '=', 'money_transaction_types.id')
            ->select('nations_money_balances.*', 'money_transaction_types.name AS transaction_type_name', 'money_transaction_types.code AS transaction_type_code')
            ->where('nations_money_balances.nation_id_to','=',$nation_id)
            ->orWhere('nations_money_balances.nation_id_from','=',$nation_id)
            ->orderBy('nations_money_balances.created_at','DESC')
            ->get();

        foreach ($ret as $item){
            $nation_to = Nations::find($item->nation_id_to);
            $nation_from = Nations::find($item->nation_id_from);
            $item->nation_name_to = $nation_to == null ? 'Centrální banka' : $nation_to->name;
            $item->nation_name_from = $nation_from == null ? 'Centrální banka' : $nation_from->name;
        }

        return $ret;
    }


}
