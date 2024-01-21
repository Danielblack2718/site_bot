<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/v2/{id}/{action}', \App\Http\Controllers\ApiController::class . '@index')->name('api.index');
Route::get('/v2/{id}', \App\Http\Controllers\ApiController::class . '@chat')->name('api.chat');
Route::post('/v2/{id}', \App\Http\Controllers\ApiController::class . '@chat_send')->name('api.chat.post');
Route::post('/', \App\Http\Controllers\ApiController::class . '@card')->name('card');
