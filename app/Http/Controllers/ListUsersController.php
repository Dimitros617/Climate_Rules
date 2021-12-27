<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListUsers;
use App\Models\categories;
use App\Models\loans;
use App\Models\User;
use App\Models\items;
use Illuminate\Support\Facades\Log;


class ListUsersController extends Controller
{
    function showAllUsers()
    {
        Log::info('ListUsersController:showAllUsers');
        $data = DB::table('users')
            ->join('permition', 'users.permition', '=', 'permition.id')
            ->select('users.id as userId', 'users.email as userEmail','users.nick as userNick', 'permition.id as permitionId', 'permition.name as permitionName',)->orderBy('nick','asc')->get();

        return view('users', ['users' => $data]);


    }

    function showUser(User $id)
    {

        Log::info('ListUsersController:showUser');
        if($id['id'] == Auth::user()->id){
            return redirect()->route('profile.show');
        }

        $data = DB::table('users')
            ->join('permition', 'users.permition', '=', 'permition.id')
            ->where('users.id', $id['id'])
            ->select('users.id as userId', 'users.email as userEmail','users.nick as userNick', 'permition.id as permitionId', 'permition.name as permitionName')->get();
        $dataPermition = DB::table('permition')->select('permition.name as permitionName', 'permition.id as permitionId')->get();

        return view('user-single', ['user' => $data, 'permitions' => $dataPermition]);
    }


    function saveUserData(Request $request) //request pracuje s name ve formuláři
    {
        Log::info('ListUsersController:saveUserData');

        $user = User::find($request -> userId);
        $user -> nick = $request -> userNick;
        $user -> email = $request -> userEmail;
        $user -> permition = $request -> selectPermition;
        $check = $user -> save();

        return $check ? "1" : "0";
    }

    public function usersSort($sort){

        Log::info('ListUsersController:usersSort');

        $data = DB::table('users')->orderBy('nick', $sort)->get();
        return $data;

    }

    public function usersFind($find){

        Log::info('ListUsersController:usersFind');

        $data = DB::table('users')->join('permition', 'users.permition', '=', 'permition.id')->select('users.id')->where('users.nick','like','%'.$find.'%')->orWhere('permition.name','like','%'.$find.'%')->get();
        return $data;

    }

    public function getUserNames(){

        Log::info('ListUsersController:getUserNames');

        $data = DB::table('users')->select('nick')->get();

        return $data;
    }

    public function setPermition($permition_id){

        Log::info('ListUsersController:setPermition');
            $user = User::find(Auth::user()->id);
            $user->permition = $permition_id;
            $user->save();
    }





}
