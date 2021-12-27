<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permition extends Model
{
    use HasFactory;
    protected $table = 'permition';
    public $timestamps = false;

    public static function getAdminId(){
        $ret = Permition::where('admin',1)->get();
        if(count($ret) == 0){
            return null;
        }else{
            return $ret[0]->id;
        }
    }
}
