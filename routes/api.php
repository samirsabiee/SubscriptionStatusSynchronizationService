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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/googleplay', [\App\Http\Controllers\MarketServiceController::class, 'googlePlay'])->name('market-service.google-play');
Route::post('/appstore', [\App\Http\Controllers\MarketServiceController::class, 'appstore'])->name('market-service.appstore');
Route::get('/last/expire/count', [\App\Http\Controllers\LastExpireCountController::class, 'lastExpCount'])->name('last-exp-count');
