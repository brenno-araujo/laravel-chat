<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserConotrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function(){
    //users
    Route::get('/user/me', [UserConotrller::class, 'me'])->name('users.me');    
    Route::get('/users', [UserConotrller::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserConotrller::class, 'show'])->name('users.show');

    //messages
    Route::get('/messages/{user}', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
});


