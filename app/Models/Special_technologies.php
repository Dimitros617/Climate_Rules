<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Special_technologies extends Model
{
    use HasFactory;

    /**
     * @param $technology_id -> id to tabulky technologies
     */
    public static function getAllSpecialsOfTechnology($technology_id){

        Log::info($technology_id);

        return DB::table('special_technologies')
            ->where('technology_id','=',$technology_id)
            ->get();

    }
}
