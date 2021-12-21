<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick',
        'email',
        'password',
        'permition',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public  $timestamps = false;


    /**
     * @param $user_id - Id uživatele u kterého chcem zjistit zda má zobrazení pod jiným uživatelem
     * @param $lobby_id - ID lobby které chceme zobrazovat
     * @return false|mixed - false když nemá uživatel žádného klona pro dané lobby, jinak vrací JSON objekt záznam z tabulky use_admin_clones
     */
    static function getCloneUser($user_id, $lobby_id){
        $clone = DB::table('users_admin_clones')
            ->where('user_id', $user_id)
            ->where('lobby_id', $lobby_id)
            ->get();

        if(count($clone)==0){
            return false;
        }
        return $clone[0];
    }
}
