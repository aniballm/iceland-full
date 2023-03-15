<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/export/{group?}', [\App\Http\Controllers\AppController::class, 'exportToExcel']);
Route::get('/{group?}', [\App\Http\Controllers\AppController::class, 'translationsList']);

Route::get( '/ajax/search', [\App\Http\Controllers\AppController::class, 'search'] );
Route::get( '/ajax/translation', [\App\Http\Controllers\AppController::class, 'getTranslationAjax'] );
