<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
            $stat->reason = 'Coppy data: '  . Auth::user()->nick;
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



    static function lastValueOneStatisticOneNation($statistic_type_id, $nation_id){

        Log::info('Round_to_nation_statistics:lastValueOneStatisticOneNation');


        $stat = DB::table('round_to_nation_statistics')
                ->select('round_to_nation_statistics.*', 'nations.statistic_values_set', 'nations.lobby_id', 'nations.name AS nation_name', 'statistics_types.name AS statistic_type_name', 'statistics_types.code_name AS statistic_type_code_name')
                ->join('nations','round_to_nation_statistics.nation_id','=','nations.id')
                ->join('statistics_types','round_to_nation_statistics.statistic_type_id','=','statistics_types.id')
                ->where([['round_to_nation_statistics.nation_id',$nation_id],['round_to_nation_statistics.statistic_type_id',$statistic_type_id]])
                ->orderBy('round_to_nation_statistics.id','DESC')
                ->get();

        return Round_to_nation_statistics::statisticIndexToValue($stat)[0];
    }
    static function lastValueAllStatisticOneNation($nation_id){

        $nations = Nations::where('lobby_id',Nations::find($nation_id)->lobby_id)->where('id', $nation_id)->get();
        $statistics_types = Statistics_types::all();

        $ret_values = array();

        foreach ($nations as $nation){

            foreach ($statistics_types as $statistics_type){
                array_push($ret_values, Round_to_nation_statistics::lastValueOneStatisticOneNation($statistics_type->id,$nation->id));
            }
        }

        return $ret_values;

    }

    static function lastValueOneStatisticAllNation($lobby_id, $statistic_type_code){

        $nations = Nations::where('lobby_id',$lobby_id)->get();
        $statistics_types = Statistics_types::where('id', $statistic_type_code)->get();

        $ret_values = array();

        foreach ($nations as $nation){

            foreach ($statistics_types as $statistics_type){

                array_push($ret_values, Round_to_nation_statistics::lastValueOneStatisticOneNation($statistics_type->id,$nation->id));
            }
        }

        return $ret_values;

    }

    static function lastValueAllStatisticAllNation($nation_id){

        $nations = Nations::where('lobby_id',Nations::find($nation_id)->lobby_id)->get();
        $statistics_types = Statistics_types::all();

        $ret_values = array();

        foreach ($nations as $nation){

            foreach ($statistics_types as $statistics_type){
                array_push($ret_values, Round_to_nation_statistics::lastValueOneStatisticOneNation($statistics_type->id,$nation->id));
            }
        }

        return $ret_values;

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

    /**
     * Funce je roscestník pro increase nebo decrease StatisticValueOfNation podle $step za je zápozná nebo kladná
     * @param $nationId
     * @param $statisticCode
     * @param $step
     * @param $reason - String flag pro to kdo hodnotu upravil a proč
     * @return int - 0 - hodnota je mimo hranice tabulky; 1 = OK ; -1 = Nenalezena aktuální hodnota; -2 = Chyba při vytváření nového záznamu do round_to_nation_statistics; -3 = Nelze hodnotu posunout OUTOFBOUNCE
     *
     *
     */
    static function changeStatisticValueOfNation($nationId, $statisticCode, $step, $reason = null){

        if($step < 0){
            return Round_to_nation_statistics::decreaseStaticticValueOfNation($nationId, $statisticCode, abs($step), $reason);
        }else{
            return Round_to_nation_statistics::increaseStaticticValueOfNation($nationId, $statisticCode, $step, $reason);
        }

    }

    /**
     * Funkce zvýší hodnotu o o step -> posun v definované tabulce pro daný národ a jeden statistický typ
     * @param $nationId
     * @param $statisticCode
     * @param $step
     * @param $reason - String proč a odkud se daná hodnota změnila - flag
     * @return int - 0 - hodnota je mimo hranice tabulky; 1 = OK ; -1 = Nenalezena aktuální hodnota; -2 = Chyba při vytváření nového záznamu do round_to_nation_statistics; -3 = Nelze hodnotu posunout OUTOFBOUNCE
     */
    static function increaseStaticticValueOfNation($nationId, $statisticCode, $step, $reason = null){

        Log::info('Round_to_nation_statistics:increaseStaticticValueOfNation');

        $curentValue = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode($statisticCode),$nationId);


        $allIndexFromSet = DB::table('nation_statistic_values')
            ->where('lobby_id', $curentValue->lobby_id)
            ->where('set', $curentValue->statistic_values_set)
            ->where('statistics_type_id',$curentValue->statistic_type_id )
            ->orderBy('nation_statistic_values.index','ASC')
            ->get();

        //Na jakém reálém indexu všech hodnot z dané sady se nachází naše puvodní kterou chceme svýšit
        $indexInArray = -1;
        for ($i = 0; $i < count($allIndexFromSet); $i++){
            if($curentValue->index == $allIndexFromSet[$i]->index && $curentValue->value == $allIndexFromSet[$i]->value){
                $indexInArray = $i;
                break;
            }
        }
        if($indexInArray == -1){
            return -1;
        }
        if($step < 0){
            return -3;
        }
        if($indexInArray+$step > (count($allIndexFromSet)-1)){
            return 0;
        }
        else{

            $newIndexFromSet = $allIndexFromSet[($indexInArray+$step)];

            if($reason == null){
                $reason = 'Admin manual increase: ' . Auth::user()->nick;
            }

            $stat = new Round_to_nation_statistics();
            $stat->nation_id = $nationId;
            $stat->round_id = Rounds::getLastRound(Nations::find($nationId)->lobby_id)->id;
            $stat->statistic_type_id = $newIndexFromSet->statistics_type_id;
            $stat->index = $newIndexFromSet->index;
            $stat->reason = $reason;
            $stat->created_at = Carbon::now()->toDateTimeString();
            $stat->updated_at = Carbon::now()->toDateTimeString();
            $stat->save();

            if($stat) {
                return 1;
            }
            else{
                return -2;
            }
        }
    }


    /**
     * Funkce sníží hodnotu o o step -> posun v definované tabulce pro daný národ a jeden statistický typ
     * @param $nationId
     * @param $statisticCode
     * @param $step
     * @param $reason - String proč a odkud se daná hodnota změnila - flag
     * @return int - 0 - hodnota je mimo hranice tabulky; 1 = OK ; -1 = Nenalezena aktuální hodnota; -2 = Chyba při vytváření nového záznamu do round_to_nation_statistics; -3 = Nelze hodnotu posunout OUTOFBOUNCE
     */
    static function decreaseStaticticValueOfNation($nationId, $statisticCode, $step, $reason = null){

        Log::info('Round_to_nation_statistics:decreaseStaticticValueOfNation');

        $curentValue = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode($statisticCode),$nationId);


        $allIndexFromSet = DB::table('nation_statistic_values')
            ->where('lobby_id', $curentValue->lobby_id)
            ->where('set', $curentValue->statistic_values_set)
            ->where('statistics_type_id',$curentValue->statistic_type_id )
            ->orderBy('nation_statistic_values.index','ASC')
            ->get();

        //Na jakém reálém indexu všech hodnot z dané sady se nachází naše puvodní kterou chceme svýšit
        $indexInArray = -1;
        for ($i = 0; $i < count($allIndexFromSet); $i++){
            if($curentValue->index == $allIndexFromSet[$i]->index && $curentValue->value == $allIndexFromSet[$i]->value){
                $indexInArray = $i;
                break;
            }
        }
        if($indexInArray == -1){
            return -1;
        }
        if($step < 0){
            return -3;
        }
        if($indexInArray-$step < 0){
            return 0;
        }
        else{

            $newIndexFromSet = $allIndexFromSet[($indexInArray-$step)];

            if($reason == null){
                $reason = 'Admin manual decrease: ' . Auth::user()->nick;
            }

            $stat = new Round_to_nation_statistics();
            $stat->nation_id = $nationId;
            $stat->round_id = Rounds::getLastRound(Nations::find($nationId)->lobby_id)->id;
            $stat->statistic_type_id = $newIndexFromSet->statistics_type_id;
            $stat->index = $newIndexFromSet->index;
            $stat->reason = $reason;
            $stat->created_at = Carbon::now()->toDateTimeString();
            $stat->updated_at = Carbon::now()->toDateTimeString();
            $stat->save();

            if($stat) {
                return 1;
            }
            else{
                return -2;
            }
        }
    }

    public static function setMinStaticticValueOfNation($nationId, $statisticCode, $reason = null){
        return Round_to_nation_statistics::setBorderStaticticValueOfNation($nationId, $statisticCode, "LOW", $reason);
    }

    public static function setMaxStaticticValueOfNation($nationId, $statisticCode, $reason = null){
        return Round_to_nation_statistics::setBorderStaticticValueOfNation($nationId, $statisticCode, "HIGH", $reason);
    }


        /**
     * @param $nationId
     * @param $statisticCode
     * @param $border - String -> 'MIN' nebo 'MAX' podle toho jaké maximum chceme nastavit nebo Integer kladný nebo záporný
     * @param null $reason
     * @return bool -> Info o správném vyzvoření záznamu v databázi v tabulce round to nation statistics
     */
    public static function setBorderStaticticValueOfNation($nationId, $statisticCode, $border, $reason = null){

        Log::info('Round_to_nation_statistics:setMaxStaticticValueOfNation');

        $curentValue = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode($statisticCode),$nationId);

        $allIndexFromSet = DB::table('nation_statistic_values')
            ->where('lobby_id', $curentValue->lobby_id)
            ->where('set', $curentValue->statistic_values_set)
            ->where('statistics_type_id',$curentValue->statistic_type_id )
            ->orderBy('nation_statistic_values.index','ASC')
            ->get();

        if($border == "HIGH" || $border > 0){
            $newIndexFromSet = $allIndexFromSet[count($allIndexFromSet)-1];
        }elseif($border == "LOW" || $border < 0){
            $newIndexFromSet = $allIndexFromSet[0];
        }else{
            Log::error('Border byl nastaven na ' . $border . " nastavte pouze HIGH nebo LOW ve stringu");
        }


        if($reason == null){
            $reason = 'Admin manual: ' . Auth::user()->nick;
        }

        $stat = new Round_to_nation_statistics();
        $stat->nation_id = $nationId;
        $stat->round_id = Rounds::getLastRound(Nations::find($nationId)->lobby_id)->id;
        $stat->statistic_type_id = $newIndexFromSet->statistics_type_id;
        $stat->index = $newIndexFromSet->index;
        $stat->reason = $reason;
        $stat->created_at = Carbon::now()->toDateTimeString();
        $stat->updated_at = Carbon::now()->toDateTimeString();
        return $stat->save();


    }



}
