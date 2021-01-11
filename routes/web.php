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

/*Route::get('/', function () {
    return view('principal/formulario');
});*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/formulario', function() {
    return view('principal/formulario');
});
Route::get('/', [App\Http\Controllers\EntradaController::class, 'index'])->name('visualizar');
Route::resource('entradas', App\Http\Controllers\EntradaController::class);
Auth::routes();

