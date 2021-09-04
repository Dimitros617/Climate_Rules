<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lobbies extends Model
{
    use HasFactory;

    public  $timestamps = false;

    function getIdbyCode($code){
        return Difficulties::where('code', $code)->value('id');
    }
}
