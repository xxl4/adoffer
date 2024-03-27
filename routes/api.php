<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CallController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('offers/jump', [OfferController::class, 'jump']);
Route::get('offers/callBack', [OfferController::class, 'callBack']);
Route::get('offers/distribute', [OfferController::class, 'distribute']);
Route::get('call/info', [CallController::class, 'info']);
Route::get('offers/country', [OfferController::class, 'country']);
Route::any('offers/offerTrack', [OfferController::class, 'offerTrack']);





