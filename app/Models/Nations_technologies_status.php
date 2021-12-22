<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nations_technologies_status extends Model
{
    use HasFactory;
    protected $table = 'nations_technologies_status';

    public static function getIdByCode($code_name){
        return Nations_technologies_status::where('code',$code_name)->get()[0]->id;
    }
}
