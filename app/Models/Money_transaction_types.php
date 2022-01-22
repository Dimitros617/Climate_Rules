<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money_transaction_types extends Model
{
    use HasFactory;

    public static function getIdByCode($transaction_code){

        return Money_transaction_types::where('code', $transaction_code)->get()[0]->id;


    }
}
