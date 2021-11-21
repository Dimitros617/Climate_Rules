<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Nations extends Model
{
    use HasFactory;

    public  $timestamps = false;

    static function removeNation($nation_id){

        Round_to_nation_statistics::deleteNationStatistics($nation_id);
        Nation_statistic_values::deleteNationStatisticValues(Nations::find($nation_id)->statistic_values_set,Nations::find($nation_id)->lobby_id);

        Nations::find($nation_id)->delete();

    }

    static function addStatsToNations($nations_arr, $round_id){

//        foreach ($nations_arr as $nation){
//            $nation->statss = Round_to_nation_statistics::oneRoundAllStatisticsOneNation($round_id, $nation->id);
//        }
//        return $nations_arr;

        for ($j = 0 ; $j< count($nations_arr); $j++){

            $rawStat = Round_to_nation_statistics::oneRoundAllStatisticsOneNation($round_id, $nations_arr[$j]->id);

            $stat = array();
            $stat_string = "{";

            for ($i = 0 ; $i< count($rawStat); $i++){
                $stat_string =  $stat_string.'"'.$rawStat[$i]->statistic_type_code_name.'":'.$rawStat[$i]->value.',';

            }
            $stat_string = substr($stat_string, 0, -1);
            $stat_string = $stat_string.'}';
            array_push($stat,json_decode($stat_string));

            $nations_arr[$j]->stats = $stat;
        }

        return $nations_arr;

    }
}
