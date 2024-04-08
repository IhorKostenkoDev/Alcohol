<?php

use http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcoholController;


Route::get('/ind', [AlcoholController::class, 'alt']);
// добавить масива в контроллере
Route::get('/create',[AlcoholController::class, 'createalcohol']);
//добавление через пост мен по ключам
Route::post('/addpostman',[AlcoholController::class, 'createalcoholpost']);
// добавить случайно сгенерированое из контроллера
Route::get('/createrandom/{count}',[AlcoholController::class, 'addrandomalco']);
Route::get('/fillTablerandom/{count}',[AlcoholController::class, 'fillTablerandom']);
//обновление данных где каунт = ид в таблице
Route::get('/update/{count}',[AlcoholController::class, 'update']);
//удаление из бази по id(спасибо чату гпт!)
Route::get('/delete/{id}',[AlcoholController::class, 'deleteid']);

Route::get('/deleterandom/{count}',[AlcoholController::class, 'deleteidcount']);
//ферст ор крейт
Route::get('/create/first_or_create',[AlcoholController::class, 'firstorcreate']);
//
Route::get('/create/update_or_create',[AlcoholController::class, 'updateorcreate']);

Route::get('/sorts/{$name}',[AlcoholController::class, 'sorts']);

Route::get('/filter', [AlcoholController::class, 'filter']);
Route::post('/filter', [AlcoholController::class, 'filter']);

