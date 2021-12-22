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
}
