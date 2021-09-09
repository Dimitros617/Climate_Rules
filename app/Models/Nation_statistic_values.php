<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Nation_statistic_values extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     *
     * Metoda zkopíruje příslušné statistics valuest z template, a pokud již set s příslušným id byl překopírován, znovu ho nekopíruji
     * @param $set_id = id setu skaly
     * @param $lobby_id = id loby
     * @return bool|void
     */
    static function copyNationStatisticValuesFromTemplate($set_id, $lobby_id, $remove_old = false){

        Log::info('Nation_statistic_values:copyNationStatisticValuesFromTemplate');


        if($remove_old){
            Nation_statistic_values::deleteNationStatisticValues($set_id, $lobby_id);
        }

        $existing_set = Nation_statistic_values::where('set',$set_id)->where('lobby_id',$lobby_id)->get();

        if(count($existing_set)!=0){
            return true;
        }

        $template_set = Nation_statistic_values_templates::where('set', $set_id)->get();

        for ($i = 0; $i < count($template_set); $i++){
            $stat = new Nation_statistic_values();
            $stat->lobby_id = $lobby_id;
            $stat->set = $template_set[$i]->set;
            $stat->statistics_type_id = $template_set[$i]->statistics_type_id;
            $stat->index = $template_set[$i]->index;
            $stat->value = $template_set[$i]->value;
            $stat->save();
        }

        return true;

    }

    static function deleteNationStatisticValues($set_id, $lobby_id){

        Log::info('Nation_statistic_values:deleteNationStatisticValues');


        $existing_nations = Nations::where('statistic_values_set',$set_id)->where('lobby_id',$lobby_id)->get();

        if(count($existing_nations)>1){
            return true;
        }

        return Nation_statistic_values::where('set',$set_id)->where('lobby_id',$lobby_id)->delete();

    }


}
