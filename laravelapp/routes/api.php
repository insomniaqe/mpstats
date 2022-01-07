<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UserMainController;

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


Route::middleware('auth:api')->group(function () {

});

Route::post('authByPassword', 'App\Http\Controllers\UserMainController@authByPassword');
Route::post('authByPasswordAdmin', 'App\Http\Controllers\UserMainController@authByPasswordAdmin');

//this need move to middleware
Route::get('getUsers', 'App\Http\Controllers\UserMainController@getUsers');
