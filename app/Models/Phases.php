<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phases extends Model
{
    use HasFactory;

    public static function getIdByCode($code){

        return Phases::where('code', $code)->get()[0]->id;

    }
}
