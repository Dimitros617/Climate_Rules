<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Lobbies extends Model
{
    use HasFactory;

    public  $timestamps = false;

    /**
     * Vrací Id dificulty podle zadaného codu
     * @param $code - code dificulty
     * @return mixed
     */
    function getIdbyCode($code){
        return Difficulties::where('code', $code)->value('id');
    }

    /**
     * @param $lobby_id
     * @return int
     */
    static function countNations($lobby_id){
        return DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->count();
    }

    static function getLobbyPhase($lobby_id){

        return DB::table('lobbies')
            ->Join('phases', 'lobbies.phase', '=', 'phases.id')
            ->where('lobbies.id', '=', $lobby_id)
            ->select('phases.*')
            ->get()[0];

    }

    static function getAdminNation($lobby_id){

        $clone = User::getCloneUser(Auth::user()->id,$lobby_id);

        if($clone == false){
            return Lobbies::getFirstNation($lobby_id);
        }
        $nation = DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->where('user_id', '=', $clone->clone_user_id)
            ->get();

        if(count($nation) == 0){
            Log::info('Lobbies:getAdminNation: tomuto účtu nebyl přidělen žádný hráč');
            if(User::removeCloneUser(Auth::user()->id,$lobby_id)){
                return response('Nelze vstoupit, Clonovanému účtu nebyl přiřazen žádný hráč v této hře! Odstranili jsme chybný clonovaný účet, zkuste to znovu a předělíme Vám nový clon účet.', 500)->header('Content-Type', 'text/plain');
            }else{
                return response('Nelze vstoupit, Clonovanému účtu nebyl přiřazen žádný hráč v této hře! Pokusily jsme se chybu opravit odstatněním clon účtu, ovšem při mazání se něco pokazilo!', 500)->header('Content-Type', 'text/plain');
            }

        }
        else if(count($nation) == 1){
            return $nation[0];
        }
        else{
            Log::info('Lobbies:getAdminNation: Tomuto účtu bylo přiděleno více hráčů!!!!');
            if(User::removeCloneUser(Auth::user()->id,$lobby_id)){
                return response('Nelze vstoupit, tvémů clonovanému účtu je přiřazeno více hráčů! Odstranili jsme clonované účty, zkuste to znovu a předělíme Vám nový clon účet.', 500)->header('Content-Type', 'text/plain');
            }else{
                return response('Nelze vstoupit, tvémů clonovanému účtu je přiřazeno více hráčů!  Pokusily jsme se chybu opravit odstatněním clon účtu, ovšem při mazání se něco pokazilo!', 500)->header('Content-Type', 'text/plain');
            }
        }
    }

    static function getFirstNation($lobby_id){
        return DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->get()[0];
    }

    static function getMyNation($lobby_id){
        $nation = DB::table('nations')
            ->where('lobby_id', '=', $lobby_id)
            ->where('user_id', '=', Auth::user()->id)
            ->get();


        if(count($nation) == 0){
            Log::info('Lobbies:getMyNation: tomuto účtu nebyl přidělen žádný hráč');

            return -1;
        }
        else if(count($nation) == 1){
            return $nation[0];
        }
        else{
            Log::info('Lobbies:getMyNation: Tomuto účtu bylo přiděleno více hráčů!!!!');
            return -2;
        }
    }

    /**
     * Metoda zkontroluje zda všechny národy v lobby používají stejný počet statystics types.
     *
     * @param $lobby_id
     * @return bool|null = pokud není v tabulce  nation_statistic_values ani jeden zavedený set
     */
    static function isDefinedNationsStatisticTypesSame($lobby_id){



        $sets = DB::table('nation_statistic_values')
            ->select('nation_statistic_values.set')
            ->where('lobby_id','=',$lobby_id)
            ->groupBy('nation_statistic_values.set')
            ->get();



        if(count($sets)==0){
            return null;
        }
        if(count($sets)==1){
            return true;
        }else{
            $sumA = DB::table('nation_statistic_values')
                ->selectRaw('COUNT(*) AS sum')
                ->where([['lobby_id',$lobby_id],['nation_statistic_values.set',$sets[0]->set]])
                ->groupBy('nation_statistic_values.statistics_type_id')
                ->get();
        }

        $diference = 0;

        for ($i = 1 ; $i< count($sets); $i++){

            $sumB = DB::table('nation_statistic_values')
                ->selectRaw('COUNT(*) AS sum')
                ->where([['lobby_id',$lobby_id],['nation_statistic_values.set',$sets[$i]->set]])
                ->groupBy('nation_statistic_values.statistics_type_id')
                ->get();

            if(count($sumA) != count($sumB)){
                $diference++;
            }

            $sumA = $sumB;
        }

        return $diference == 0 ? true : false;

    }


    /**
     * Metoda vrací pole obsahující záznamy všech uživatelů (users) které jsou přiděleny národům v konkrétním lobby
     * @param $lobby_id
     * @return \Illuminate\Support\Collection
     */
    static function getAllUsersFromLobby($lobby_id){

        return DB::table('nations')
            ->Join('users', 'nations.user_id', '=', 'users.id')
            ->select('users.id', 'users.nick')
            ->where('nations.lobby_id','=',$lobby_id)
            ->get();


    }

    /**
     * Metoda vrací pole obsahující záznamy všech narodu (nations) které jsou přiděleny v konkrétním lobby
     * @param $lobby_id
     * @return \Illuminate\Support\Collection
     */
    static function getAllNationsFromLobby($lobby_id){

        return DB::table('nations')
            ->where('nations.lobby_id','=',$lobby_id)
            ->get();
    }

    static function getOneNationRoundIcome($nation_id){

        $nation = DB::table('nations')
            ->where('id','=',$nation_id)
            ->first();


            $economy = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('economy'),$nation->id);
            $tax = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('tax'),$nation->id);

            $nation->round_income = $economy * $tax;


        return $nation;
    }

    public static function getAllNationsRoundIcomeFromLobby($lobby_id){

        $nations = DB::table('nations')
                ->where('nations.lobby_id','=',$lobby_id)
                ->get();

        foreach ($nations as $nation){
            $economy = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('economy'),$nation->id)->value;
            $tax = Round_to_nation_statistics::lastValueOneStatisticOneNation(Statistics_types::getIdByCode('tax'),$nation->id)->value;
            $nation->round_income = $economy * $tax;
        }

        return $nations;
    }

    public static function updateActualLobbyGasses($lobby_id, $gasses_value = null, $gasses_increas_of = null){

        Log::info($gasses_value);
        Log::info($gasses_increas_of);
        if($gasses_value === null && $gasses_increas_of === null){
            return response('Nelze změnit hodnota SP, nebylo definováno o kolik nebo na jakou hodnotu!', 500)->header('Content-Type', 'text/plain');
        }

        if($gasses_value === null && $gasses_increas_of !== null){
            $gasses = Lobbies::where('id',$lobby_id)->first()->actual_gasses + $gasses_increas_of;
        }

        if($gasses_value !== null && $gasses_increas_of === null){
            $gasses = $gasses_value;
        }

        $check = DB::table('lobbies')
            ->where('id', $lobby_id)
            ->update([
                'actual_gasses' => $gasses,
                'updated_at' => Carbon::now()->toDateTimeString(),

            ]);

        if($check){
            return 1;
        }else{
            return response('Nepodařilo se upravit data v databázi, tabulka Lobbies!', 500)->header('Content-Type', 'text/plain');

        }
    }


}
