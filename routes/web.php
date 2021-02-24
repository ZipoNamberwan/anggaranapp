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

// indra route
Route::get('/pok', [App\Http\Controllers\PokController::class, 'index']);
Route::get('/pok/addchild/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'create']);
Route::get('/pok/edit/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'edit']);
Route::get('/pok/delete/{type}/id/{id}', [App\Http\Controllers\PokController::class, 'delete']);
Route::post('/pok', [App\Http\Controllers\PokController::class, 'store']);
Route::patch('/pok/{type}/{id}', [App\Http\Controllers\PokController::class, 'update']);

Route::get('/dashboard', function () {
    return view('blank');
});