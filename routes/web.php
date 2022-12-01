<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/kriteria")->group(function () {
    Route::get("/", [App\Http\Controllers\KriteriaController::class, 'index'])->name("kriteria");
    Route::get("/tambah", [App\Http\Controllers\KriteriaController::class, 'tambah'])->name("kriteria-tambah");
    Route::get("/nilai", [App\Http\Controllers\KriteriaController::class, 'nilai'])->name("nilai-kriteria");
});
