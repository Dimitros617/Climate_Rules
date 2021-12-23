<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics_types extends Model
{
    use HasFactory;

    public static function getIdByCode($statistic_code){

        return Statistics_types::where('code_name', $statistic_code)->get()[0]->id;


    }
}
