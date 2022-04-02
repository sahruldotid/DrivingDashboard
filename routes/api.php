<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OmzetController;
use App\Http\Controllers\Api\PlayerController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/omzet-daily', [OmzetController::class, 'omzet_daily']);
Route::get('/omzet-monthly', [OmzetController::class, 'omzet_monthly']);
Route::get('/omzet-monthly-zt2', [OmzetController::class, 'omzet_monthly_zt2']);
Route::get('/omzet-monthly-zt3', [OmzetController::class, 'omzet_monthly_zt3']);
Route::get('/omzet-yearly', [OmzetController::class, 'omzet_yearly']);
Route::get('/omzet-yearly-zt', [OmzetController::class, 'omzet_yearly_zt']);
Route::get('/player-monthly', [PlayerController::class, 'monthly_playertot']);

