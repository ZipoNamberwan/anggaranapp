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

Route::get('/', function () {
    return view('index');
});

Route::get('/rpd', [App\Http\Controllers\LihatRpd::class, 'index']);

// -- indra route
Route::get('/pok', [App\Http\Controllers\PokController::class, 'index']);
Route::get('/pok/addchild/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'create']);
Route::get('/pok/edit/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'edit']);
Route::delete('/pok/delete/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'destroy']);
Route::get('/pok/changepos/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'showChangePosition']);
Route::post('/pok/changepos/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'updatePosition']);
Route::post('/pok', [App\Http\Controllers\PokController::class, 'store']);
Route::patch('/pok/{type}/{id}', [App\Http\Controllers\PokController::class, 'update']);
Route::patch('/pok/{type}/{id}', [App\Http\Controllers\PokController::class, 'update']);

Route::get('/downloadpok', [App\Http\Controllers\DownloadController::class, 'index']);
Route::post('/downloadpok', [App\Http\Controllers\DownloadController::class, 'download']);

// -- sampai sini

Route::get('/dashboard', function () {
    return view('blank');
});
