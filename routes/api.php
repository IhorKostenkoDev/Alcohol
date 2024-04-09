<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcoholApiController;

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
Route::get('/alcohol',[AlcoholApiController::class, 'alcohol']);
Route::post('/add_alcohol',[AlcoholApiController::class, 'addalcohol']);
Route::post('/update_alcohol/{id}', [AlcoholApiController::class, 'updatealcohol']);





