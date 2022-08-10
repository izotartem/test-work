<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaguesController;
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

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('leagues', [LeaguesController::class, 'getLeaguesIds']);
    Route::get('leagues/{id}', [LeaguesController::class, 'getLeagueById']);
    Route::post('leagues', [LeaguesController::class, 'saveLeaguesFromApi']);

});

