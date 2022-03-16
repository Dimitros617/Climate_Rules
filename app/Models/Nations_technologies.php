<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Nations_technologies extends Model
{
    use HasFactory;

    public static function getOneNationTechnology($nation_id, $technology_id){
        return DB::table('nations_technologies')
            ->where('nations_technologies.technology_id','=',$technology_id)
            ->where('nations_technologies.nation_id','=',$nation_id)
            ->first();
    }

    public static function getAllNationsStatusOfTechnology($technology_id){

        return DB::table('nations_technologies')
                ->select('nations_technologies.*','nations_technologies_status.name','nations_technologies_status.code', 'nations.name AS nation_name')
                ->join('nations_technologies_status','nations_technologies.status_id','=','nations_technologies_status.id')
                ->join('nations','nations_technologies.nation_id','=','nations.id')
                ->where('nations_technologies.technology_id','=',$technology_id)
                ->get();

    }

    public static function getOneNationStatusOfTechnology($nation_id, $technology_id){

        return DB::table('nations_technologies')
            ->select('nations_technologies.*','nations_technologies_status.name','nations_technologies_status.code')
            ->join('nations_technologies_status','nations_technologies.status_id','=','nations_technologies_status.id')
            ->where('nations_technologies.technology_id','=',$technology_id)
            ->where('nations_technologies.nation_id','=',$nation_id)
            ->get();

    }

    public static function countNationsWithWorkStatus($technology_id){

        return DB::table('nations_technologies')
            ->join('nations_technologies_status','nations_technologies.status_id','=','nations_technologies_status.id')
            ->where('nations_technologies.technology_id','=',$technology_id)
            ->where(
                function ($query) {
                $query->where('nations_technologies_status.code','=','investment')
                ->orWhere('nations_technologies_status.code','=','certificate');
                })
            ->count();

    }

    public static function countNationsWithActiveStatus($technology_id){

        return DB::table('nations_technologies')
            ->join('nations_technologies_status','nations_technologies.status_id','=','nations_technologies_status.id')
            ->where('nations_technologies.technology_id','=',$technology_id)
            ->where('nations_technologies_status.code','=','active')
            ->count();

    }

    public static function addNationStatus($technology_id, $nation_id, $status_id){

        $tech = new Nations_technologies;
        $tech->technology_id = $technology_id;
        $tech->nation_id = $nation_id;
        $tech->status_id = $status_id;
        $tech->patent = 0;
        $tech->created_at = Carbon::now()->toDateTimeString();
        $tech->updated_at = Carbon::now()->toDateTimeString();
        return $tech->save();


    }

    public static function setNationStatus($technology_id, $nation_id, $status_id){

        return DB::table('nations_technologies')
            ->where('technology_id', $technology_id)
            ->where('nation_id', $nation_id)
            ->update([
                'status_id' => $status_id,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);


    }

    public static function setNationPatent($technology_id, $nation_id, $patent){

        return DB::table('nations_technologies')
            ->where('technology_id', $technology_id)
            ->where('nation_id', $nation_id)
            ->update([
                'patent' => $patent,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
    }

    public static function getValueOfAllMyTechnologies($nation_id){

        if(Nations_technologies::where('nation_id', $nation_id)->count() == 0){
            return 0;
        }

        return DB::table('nations_technologies')
            ->select(DB::raw("SUM(technologies.price) as total_price"))
            ->join('lobby_to_technologies','nations_technologies.technology_id','=','lobby_to_technologies.id')
            ->join('technologies','lobby_to_technologies.technology_id','=','technologies.id')
            ->where('nations_technologies.nation_id','=',$nation_id)
            ->where('nations_technologies.status_id','!=', Nations_technologies_status::getIdByCode('new'))
            ->get()[0]->total_price;

    }

    public static function getOneTechnologyPatentPrice($technology_id){

        if(!Nations_technologies::isTechnologyPatentedBySomeone($technology_id)){
            return 0;
        }

        $nation_technology_patented = Nations_technologies::where('id', $technology_id)->where('patent', 1)->first()->nation_id;
        return Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('level_economy'),$nation_technology_patented)->value;

    }

    public static function isTechnologyPatentedBySomeone($technology_id){

        return Nations_technologies::where('id', $technology_id)->where('patent', 1)->count() == 0 ? false : true;
    }

    public static function setTechnologyCertificationChose($technology_id, $nation_id, $description, $benefits, $disadvantages, $business, $people){

        return DB::table('nations_technologies')
            ->where('technology_id', $technology_id)
            ->where('nation_id', $nation_id)
            ->update([
                'first_try' => 1,
                'chose_description' => $description,
                'chose_benefits' => $benefits,
                'chose_disadvantages' => $disadvantages,
                'chose_business' => $business,
                'chose_people' => $people,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

    }

}
