<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListUsersController;
use App\Http\Controllers\PermitionController;

use App\Http\Controllers\LobbiesController;
use App\Models\ListUsers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|php
*/
App::setLocale('cs');


Route::get('/new-user-error', function () {    return view('new-user-error');});
Route::get('/logout', function () {  auth()->logout(); return redirect('/lobbies'); });

Route::get('/', function () {    return view('welcome');});
Route::get('/lobbies', [LobbiesController::class,'showLobbies']);
Route::get('/dashboard', function () {  return redirect('/lobbies'); });


//Route::middleware([])->get('/', [DashboardController::class,'show'])->name("dashboard");


//Lobby

Route::middleware(['auth:sanctum', 'verified', 'permition:admin'])->put('/addLobby', [LobbiesController::class,'addLobby']);





//Uživatelé
Route::middleware(['auth:sanctum', 'verified', 'permition:new_user'])->post('/users/{id:id}/saveUserData', [ListUsersController::class,'saveUserData']);
Route::middleware(['auth:sanctum', 'verified', 'permition:new_user'])->get('/users/usersSort/{sort?}', [ListUsersController::class,'usersSort']);
Route::middleware(['auth:sanctum', 'verified', 'permition:new_user'])->get('/users/usersFind/{find?}', [ListUsersController::class,'usersFind']);
Route::middleware(['auth:sanctum', 'verified', 'permition:new_user'])->get('/getUserNames', [ListUsersController::class,'getUserNames']);
Route::middleware(['auth:sanctum', 'verified', 'permition:new_user'])->get('/get_user_status/{id:id}', [ListUsersController::class,'getStatus']);

Route::middleware(['auth:sanctum', 'verified', 'permition:new_user'])->get('/users', [ListUsersController::class,'showAllUsers']);
Route::middleware(['auth:sanctum', 'verified', 'permition:new_user'])->get('/users/{id:id}', [ListUsersController::class,'showUser']);

//Oprávnění
Route::middleware(['auth:sanctum', 'verified', 'permition:edit_permitions'])->post('/addPermition', [PermitionController::class,'addPermition']);
Route::middleware(['auth:sanctum', 'verified', 'permition:edit_permitions'])->post('/savePermitionData', [PermitionController::class,'savePermitionData']);
Route::middleware(['auth:sanctum', 'verified', 'permition:edit_permitions'])->delete('/removePermition/{id:id}', [PermitionController::class,'removePermition']);

Route::middleware(['auth:sanctum', 'verified', 'permition:edit_permitions'])->get('/permitions', [PermitionController::class,'showPermissions']);
