<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Technologies_areas extends Model
{
    use HasFactory;

    public static function setAllTechnologyAreas($technology_id){

        return Technologies::getAllTechnologyAreas($technology_id);

    }
}
