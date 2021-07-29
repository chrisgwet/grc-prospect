<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\ProspectController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('prospects',ProspectController::class);

//Route::prefix('users')->group(function () {
//    Route::get('/infos/{id}', [LoginController::class, 'infos']);
//    Route::post('/login', [LoginController::class, 'login']);
//});
