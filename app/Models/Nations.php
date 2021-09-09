<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nations extends Model
{
    use HasFactory;

    public  $timestamps = false;

    static function removeNation($nation_id){

        Round_to_nation_statistics::deleteNationStatistics($nation_id);
        Nation_statistic_values::deleteNationStatisticValues(Nations::find($nation_id)->statistic_values_set,Nations::find($nation_id)->lobby_id);

        Nations::find($nation_id)->delete();

    }
}
