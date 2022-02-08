<?php

use App\Events\MyEvent;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    Log::info('YES - channel');

    return $user;
});

//Broadcast::channel('my-channel', function ($user) {
//    Log::info('YES -  my channel');
//    event(new MyEvent('hello worldoslav2'));
//    return "yess";
//});
