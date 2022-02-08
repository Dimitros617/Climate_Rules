<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Technologies_branches extends Model
{
    use HasFactory;

    public static function getAllTechnologyBranches($technology_id){

        return Technologies::getAllTechnologyBranches($technology_id);

    }
}
