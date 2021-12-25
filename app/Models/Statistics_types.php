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

    /**
     * Funkce kontroluje zda existuje záznam s code_name typu level_NAZEV
     * @param $statistic_code - s level nebo bez
     * @return bool - ano ne hodnota pokud existuje záznam v tabulce statistics_types
     */
    public static function existLevelCode($statistic_code){

        if(!str_contains($statistic_code, 'level_')){
            $statistic_code = 'level_'.$statistic_code;
        }

        $ret = Statistics_types::where('code_name', $statistic_code)->get();

        if(count($ret)==0){
            return false;
        }else{
            return true;
        }

    }
}
