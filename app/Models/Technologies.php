<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Technologies extends Model
{
    use HasFactory;

    /**
     * Funkce vrátí index move a příslušný statistický type všetně kodu jména a iconky. propojení statisics_types a technologies_statistics_types_changes
     * @param $technology_id - id z tabulky technologies
     * @return \Illuminate\Support\Collection
     */
 public static function getAllStatisticTypeOfTechnologi($technology_id){

     return DB::table('technologies_statistics_types_changes')
             ->select('technologies_statistics_types_changes.index_move','statistics_types.name','statistics_types.code_name','statistics_types.positive_value' ,'statistics_types.icon','statistics_types.unit')
             ->join('technologies','technologies_statistics_types_changes.technology_id','=','technologies.id')
             ->join('statistics_types','technologies_statistics_types_changes.statistic_type_id','=','statistics_types.id')
             ->where('technologies.id','=',$technology_id)
             ->get();

 }

     public static function getPriceOfTechnology($technology_id){
         return Technologies::find($technology_id)->price;
     }

    public static function getAllTechnologyBranches($technology_id){

        return DB::table('technologies_branches')
            ->select('branches.*')
            ->join('branches','technologies_branches.branch_id','=','branches.id')
            ->where('technologies_branches.technology_id','=',$technology_id)
            ->get();

    }

    public static function getAllTechnologyAreas($technology_id){

        return DB::table('technologies_areas')
            ->select('areas.*')
            ->join('areas','technologies_areas.area_id','=','areas.id')
            ->where('technologies_areas.technology_id','=',$technology_id)
            ->get();

    }

}
