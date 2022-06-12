<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\NationsController;
use App\Http\Controllers\TechnologiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListUsersController;
use App\Http\Controllers\PermitionController;
use App\Http\Controllers\LanguageController;
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


Route::get('/new-user-error', function () {    return view('new-user-error');});
Route::get('/logout', function () {  auth()->logout(); return redirect('/lobbies'); });

Route::get('/', function () {    return view('welcome');});

Route::get('/dashboard', function () {  return redirect('/lobbies'); });
Route::get('/setLang/{lang?}', [LanguageController::class,'switchLang']);



//Route::middleware([])->get('/', [DashboardController::class,'show'])->name("dashboard");


//Content
Route::middleware(['auth:sanctum', 'verified', 'permition:admin'])->delete('/removeElement', [ContentController::class,'removeElement']);
Route::middleware(['auth:sanctum', 'verified', 'permition:admin'])->post('/changeElement', [ContentController::class,'changeElement']);

//Lobby
Route::middleware(['localization'])->get('/lobbies', [LobbiesController::class,'showLobbies']);
Route::middleware(['localization'])->get('/getLobbies', [LobbiesController::class,'getLobbiesHTML']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->put('/addLobby', [LobbiesController::class,'addLobby']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/editLobby/{id:id}', [LobbiesController::class,'editLobby']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/editLobbyNations/{id:id}', [LobbiesController::class,'editLobbyNations']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/saveLobby', [LobbiesController::class,'saveLobby']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->delete('/removeLobby', [LobbiesController::class,'removeLobby']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/setUserClone', [LobbiesController::class,'setUserClone']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/changeLobbyStartTemperature', [LobbiesController::class,'changeLobbyStartTemperature']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->get('/getLobbyTemperature/{id:id}', [LobbiesController::class,'getLobbyTemperature']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->get('/getLobbyGasses/{id:id}', [LobbiesController::class,'getLobbyGasses']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->get('/getLobbyGasStep/{id:id}', [LobbiesController::class,'getLobbyGasStep']);




//Lobby - global
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play', 'lobby'])->get('/lobby/{lobby_id?}', [LobbiesController::class,'enterLobby']);

//Lobby - local
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play', 'lobby'])->get('/lobby/{lobby_id?}/nation', [LobbiesController::class,'getLobbyNation']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin', 'lobby'])->get('/lobby/{lobby_id?}/nation/{nation_id?}', [LobbiesController::class,'getLobbyNation']);

//Game
Route::middleware(['localization', 'auth:sanctum', 'verified'])->get('/updateGlobalTable/{id:id}', [GameController::class,'updateGlobalTable']);
Route::middleware(['localization', 'auth:sanctum', 'verified'])->get('/updateTemperatureActualValue/{id:id}', [GameController::class,'updateTemperatureActualValue']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/getEditNationStatisticTypes/{nation_id:nation_id}', [LobbiesController::class,'getEditNationStatisticTypes']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/increaseValue', [GameController::class,'increaseValue']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/decreaseValue', [GameController::class,'decreaseValue']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/changeNationStatisticTypes', [GameController::class,'changeNationStatisticTypes']);


Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->post('/changeNationTax', [GameController::class,'changeNationTax']);


Route::middleware(['localization', 'auth:sanctum', 'verified'])->get('/getCountRounds/{lobbyID?}', [GameController::class,'getCountRounds']);
Route::middleware(['localization', 'auth:sanctum', 'verified'])->get('/getLobbyUsers/{lobbyID?}', [GameController::class,'getLobbyUsers']);

Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/addRound', [GameController::class,'addround']);


//Nations
Route::middleware(['localization'])->get('/getEditNations', [NationsController::class,'getEditNations']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->put('/addNation', [NationsController::class,'addNation']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->delete('/removeNation', [NationsController::class,'removeNation']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/saveNationFromTemplate', [NationsController::class,'saveNationFromTemplate']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/saveNationsUser', [NationsController::class,'saveNationsUser']);

//technologies
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->get('/lobby/{lobby_id?}/technologies', [TechnologiController::class,'show']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->post('/changeNationToTechnologyStatus', [TechnologiController::class,'changeNationToTechnologyStatus']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->post('/changeTechnologyParameter', [TechnologiController::class,'changeTechnologyParameter']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/setNationToTechnologyStatus', [TechnologiController::class,'setNationToTechnologyStatus']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/getTechnologySetting/{technology_id?}', [TechnologiController::class,'getTechnologySetting']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->post('/getTechnologyCertificateForm', [TechnologiController::class,'getTechnologyCertificateForm']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->get('/getTechnologyDescription/{technology_id?}', [TechnologiController::class,'getTechnologyDescription']);


Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/saveImage', [TechnologiController::class,'saveImage']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->delete('/removeImage', [TechnologiController::class,'removeImage']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/setImage', [TechnologiController::class,'setImage']);


//Bank
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->get('/lobby/{lobby_id?}/bank', [BankController::class,'show']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->get('/lobby/{lobby_id?}/bank/getOnePayForm', [BankController::class,'getOnePayForm']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:play'])->post('/lobby/{lobby_id?}/bank/addOnePay', [BankController::class,'addOnePay']);




//Uživatelé
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/users/{id:id}/saveUserData', [ListUsersController::class,'saveUserData']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/users/usersSort/{sort?}', [ListUsersController::class,'usersSort']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/users/usersFind/{find?}', [ListUsersController::class,'usersFind']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/getUserNames', [ListUsersController::class,'getUserNames']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/get_user_status/{id:id}', [ListUsersController::class,'getStatus']);

Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/users', [ListUsersController::class,'showAllUsers']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->get('/users/{id:id}', [ListUsersController::class,'showUser']);

//Oprávnění
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/addPermition', [PermitionController::class,'addPermition']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->post('/savePermitionData', [PermitionController::class,'savePermitionData']);
Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:admin'])->delete('/removePermition/{id:id}', [PermitionController::class,'removePermition']);

Route::middleware(['localization', 'auth:sanctum', 'verified', 'permition:edit_permitions'])->get('/permitions', [PermitionController::class,'showPermissions']);

//help
Route::get('/help', [DashboardController::class,'showHelp']);
Route::get('/help-test', [DashboardController::class,'helpTest']);

