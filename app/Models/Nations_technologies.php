<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nations_technologies extends Model
{
    use HasFactory;


    public static function getAllNationsStatusOfTechnology($technology_id){

        return DB::table('nations_technologies')
                ->select('nations_technologies.*','nations_technologies_status.name','nations_technologies_status.code')
                ->join('nations_technologies_status','nations_technologies.status_id','=','nations_technologies_status.id')
                ->where('nations_technologies.technology_id','=',$technology_id)
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
}
