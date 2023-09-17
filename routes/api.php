<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustumersController;

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

Route::middleware(['user.api','log.api'])->group(function () {
    Route::post('/register',[UserController::class,"save"]);
});

Route::post("/login",[AuthController::class,"login"]);
Route::post("/logout",[AuthController::class,"logout"]);

Route::middleware(['auth.api','log.api'])->group(function () {
    Route::get("/custumers",[CustumersController::class,"get"]);
    Route::delete("/custumers/{dni}",[CustumersController::class,"delete"])->whereNumber("dni");
});

