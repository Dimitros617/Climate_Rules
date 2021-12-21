<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Users_admin_clones extends Model
{
    use HasFactory;

    static function addUserClone($user_id, $user_id_clone, $lobby_id){



        if(Users_admin_clones::where('user_id',$user_id)->where('lobby_id',$lobby_id)->count() != 0){
            Log::info('ano');
            if(!Users_admin_clones::removeUserClone($user_id, $lobby_id)){
                return -1;
            }
        }else{
            Log::info('ne');
        }


        $clone = new Users_admin_clones;
        $clone->user_id = $user_id;
        $clone->clone_user_id = $user_id_clone;
        $clone->lobby_id = $lobby_id;
        $clone->created_at = Carbon::now()->toDateTimeString();
        $clone->updated_at = Carbon::now()->toDateTimeString();
        $check = $clone->save();

        if(!$check){
            return 0;
        }else{
            return 1;
        }

    }

    static function removeUserClone($user_id, $lobby_id){
        return Users_admin_clones::where('user_id',$user_id)->where('lobby_id',$lobby_id)->delete();
    }
}
