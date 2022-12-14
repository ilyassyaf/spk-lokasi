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
    // Kriteria
    Route::get("/", [App\Http\Controllers\KriteriaController::class, 'index'])->name("kriteria");
    Route::get("/create", [App\Http\Controllers\KriteriaController::class, 'tambah'])->name("kriteria-tambah");
    Route::post("/save", [App\Http\Controllers\KriteriaController::class, 'simpan'])->name("kriteria-simpan");
    Route::get("/edit/{id}", [App\Http\Controllers\KriteriaController::class, 'edit'])->name("kriteria-edit");
    Route::post("/update/{id}", [App\Http\Controllers\KriteriaController::class, 'update'])->name("kriteria-update");
    Route::get("/delete/{id}", [App\Http\Controllers\KriteriaController::class, 'hapus'])->name("kriteria-hapus");

    // Nilai Kriteria
    Route::get("/nilai", [App\Http\Controllers\NilaiKriteriaController::class, 'index'])->name("nilai-kriteria");
    Route::get("/nilai/create", [App\Http\Controllers\NilaiKriteriaController::class, 'tambah'])->name("tambah-nilai-kriteria");
});

Route::prefix("/alternatif")->group(function () {
    Route::get("/", [App\Http\Controllers\AlternatifController::class, 'index'])->name("alternatif");
    Route::get("/create", [App\Http\Controllers\AlternatifController::class, 'tambah'])->name("alternatif-tambah");
});
