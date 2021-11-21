<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Round_to_nation_statistics extends Model
{
    use HasFactory;


    static function copyNationStatisticsFromTemplate($nation_id_from, $nation_id_to, $remove_old = false){

        Log::info('Round_to_nation_statistics:copyNationStatisticsFromTemplate');


        if($remove_old){
            Round_to_nation_statistics::deleteNationStatistics($nation_id_to);
        }

        $nations_statistics = Start_to_nation_statistics::where('nation_template_id',$nation_id_from)->get();

        for ($i = 0; $i < count($nations_statistics); $i++){

            $stat = new Round_to_nation_statistics();
            $stat->nation_id = $nation_id_to;
            $stat->round_id = Rounds::all()->last()->id;
            $stat->statistic_type_id = $nations_statistics[$i]->statistic_type_id;
            $stat->index = $nations_statistics[$i]->index;
            $stat->reason = 'Coppy data';
            $stat->created_at = Carbon::now()->toDateTimeString();
            $stat->updated_at = Carbon::now()->toDateTimeString();
            $stat->save();
        }

    }

    static function deleteNationStatistics($nation_id){
        Log::info('Round_to_nation_statistics:deleteNationStatistics');

           return Round_to_nation_statistics::where('nation_id', $nation_id)->delete();
    }

    static function statisticIndexToValue($arr){

        Log::info('Round_to_nation_statistics:statisticIndexToValue');



        $ret_values = array();

        for ($i = 0; $i < count($arr); $i++){

            $value = DB::table('nation_statistic_values')
                ->select('value')
                ->where('lobby_id',$arr[$i]->lobby_id)
                ->where('set',$arr[$i]->statistic_values_set)
                ->where('statistics_type_id', $arr[$i]->statistic_type_id)
                ->where('index', $arr[$i]->index)
                ->get()[0]->value;

            $arr[$i]->value = $value;

            array_push($ret_values, $arr[$i]);

        }

        return $ret_values;
    }

    static function countvalues($stats){

        Log::info('Round_to_nation_statistics:countvalues');

        $count = 0;

        foreach ($stats as $stat){
            $count += $stat->value;
        }

        return $count;
    }

    static function oneRoundOneStatisticOneNation($round_id, $statistic_type_code,  $nation_id){

        Log::info('Round_to_nation_statistics:oneRoundOneStatisticOneNation');

        $stat = DB::table('round_to_nation_statistics')
            ->select('round_to_nation_statistics.*', 'nations.statistic_values_set', 'nations.lobby_id', 'nations.name AS nation_name')
            ->join('nations','round_to_nation_statistics.nation_id','=','nations.id')
            ->join('statistics_types','round_to_nation_statistics.statistic_type_id','=','statistics_types.id')
            ->where('round_to_nation_statistics.nation_id', $nation_id)
            ->where('round_to_nation_statistics.round_id', $round_id)
            ->where('statistics_types.code_name', $statistic_type_code)
            ->orderBy('round_to_nation_statistics.id', 'desc')
            ->get()[0];

        $temp = array($stat);

        return Round_to_nation_statistics::statisticIndexToValue($temp);

    }

        static function oneRoundAllStatisticsOneNation($round_id, $nation_id){

        Log::info('Round_to_nation_statistics:oneRoundAllStatisticsOneNation');

        $stat = DB::table('round_to_nation_statistics')
            ->select('round_to_nation_statistics.*', 'nations.statistic_values_set', 'nations.lobby_id', 'nations.name AS nation_name', 'statistics_types.name AS statistic_type_name', 'statistics_types.code_name AS statistic_type_code_name')
            ->join('nations','round_to_nation_statistics.nation_id','=','nations.id')
            ->join('statistics_types','round_to_nation_statistics.statistic_type_id','=','statistics_types.id')
            ->whereRaw('round_to_nation_statistics.id IN (SELECT MAX(round_to_nation_statistics.id) AS id
                FROM round_to_nation_statistics
                WHERE round_to_nation_statistics.nation_id = ' . $nation_id . '
                AND round_to_nation_statistics.round_id =' . $round_id . '

                GROUP BY  round_to_nation_statistics.statistic_type_id)')
            ->orderBy('round_to_nation_statistics.nation_id')
            ->orderBy('round_to_nation_statistics.statistic_type_id')
            ->get();

        return Round_to_nation_statistics::statisticIndexToValue($stat);

    }

    static function oneRoundOneStatisticAllNations($round_id, $statistic_type_code){

        Log::info('Round_to_nation_statistics:oneRoundOneStatisticAllNations');

        $stat = DB::table('round_to_nation_statistics')
            ->select('round_to_nation_statistics.*', 'nations.statistic_values_set', 'nations.lobby_id', 'nations.name AS nation_name')
            ->join('nations','round_to_nation_statistics.nation_id','=','nations.id')
            ->join('statistics_types','round_to_nation_statistics.statistic_type_id','=','statistics_types.id')
//            ->where('statistics_types.code_name','=',$statistic_type_code)
//            ->where('round_to_nation_statistics.round_id','=',$round_id)
            ->whereRaw('round_to_nation_statistics.id IN (SELECT MAX(round_to_nation_statistics.id) AS id
                             FROM round_to_nation_statistics
                             INNER join statistics_types on round_to_nation_statistics.statistic_type_id = statistics_types.id
                             WHERE statistics_types.code_name = "' . $statistic_type_code . '"
                             AND round_to_nation_statistics.round_id =' . $round_id . '
                             GROUP BY round_to_nation_statistics.nation_id)')
            ->orderBy('round_to_nation_statistics.nation_id')
            ->orderBy('round_to_nation_statistics.statistic_type_id')
            ->get();


        return Round_to_nation_statistics::statisticIndexToValue($stat);

    }

    static function oneRoundAllStatisticsAllNations($round_id){

        Log::info('Round_to_nation_statistics:oneRoundAllStatisticsAllNations');

        $stat = DB::table('round_to_nation_statistics')
            ->select('round_to_nation_statistics.*', 'nations.statistic_values_set', 'nations.lobby_id', 'nations.name AS nation_name')
            ->join('nations','round_to_nation_statistics.nation_id','=','nations.id')
            ->join('statistics_types','round_to_nation_statistics.statistic_type_id','=','statistics_types.id')
            ->where('round_to_nation_statistics.round_id','=',$round_id)
            ->whereRaw('round_to_nation_statistics.id IN (SELECT MAX(round_to_nation_statistics.id) AS id
                             FROM round_to_nation_statistics
                             GROUP BY round_to_nation_statistics.nation_id, round_to_nation_statistics.statistic_type_id)')
            ->orderBy('round_to_nation_statistics.nation_id')
            ->orderBy('round_to_nation_statistics.statistic_type_id')
            ->get();

        return Round_to_nation_statistics::statisticIndexToValue($stat);

    }


    static function lastRoundOneStatisticOneNation($statistic_type_code,  $nation_id){

        Log::info('Round_to_nation_statistics:lastRoundOneStatisticOneNation');

        $stat = DB::table('round_to_nation_statistics')
            ->select('round_to_nation_statistics.*', 'nations.statistic_values_set', 'nations.lobby_id', 'nations.name AS nation_name')
            ->join('nations','round_to_nation_statistics.nation_id','=','nations.id')
            ->join('statistics_types','round_to_nation_statistics.statistic_type_id','=','statistics_types.id')
            ->where('round_to_nation_statistics.nation_id', $nation_id)
            ->where('round_to_nation_statistics.round_id', Rounds::where('lobby_id',Nations::where('id',$nation_id)->get()[0]->lobby_id)->orderBy('id', 'desc')->first())
            ->where('statistics_types.code_name', $statistic_type_code)
            ->orderBy('round_to_nation_statistics.id', 'desc')
            ->get()[0];

        $temp = array($stat);

        return Round_to_nation_statistics::statisticIndexToValue($temp);

    }

    static function lastRoundAllStatisticsOneNation($nation_id){

        Log::info('Round_to_nation_statistics:lastRoundAllStatisticsOneNation');

        $stat = DB::table('round_to_nation_statistics')
            ->select('round_to_nation_statistics.*', 'nations.statistic_values_set', 'nations.lobby_id', 'nations.name AS nation_name')
            ->join('nations','round_to_nation_statistics.nation_id','=','nations.id')
            ->join('statistics_types','round_to_nation_statistics.statistic_type_id','=','statistics_types.id')
            ->whereRaw('round_to_nation_statistics.id IN (SELECT MAX(round_to_nation_statistics.id) AS id
                FROM round_to_nation_statistics
                WHERE round_to_nation_statistics.nation_id = ' . $nation_id . '
                AND round_to_nation_statistics.round_id =' . Rounds::where('lobby_id',Nations::where('id',$nation_id)->get()[0]->lobby_id)->orderBy('id', 'desc')->first() . '

                GROUP BY  round_to_nation_statistics.statistic_type_id)')
            ->orderBy('round_to_nation_statistics.nation_id')
            ->orderBy('round_to_nation_statistics.statistic_type_id')
            ->get();

        return Round_to_nation_statistics::statisticIndexToValue($stat);

    }


}
