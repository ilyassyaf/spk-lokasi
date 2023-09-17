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

Route::middleware(['admin'])->group(function(){
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
        Route::get("/nilai/edit/{id}", [App\Http\Controllers\NilaiKriteriaController::class, 'edit'])->name("edit-nilai-kriteria");
        Route::post("/nilai/save", [App\Http\Controllers\NilaiKriteriaController::class, 'simpan'])->name("simpan-nilai-kriteria");
        Route::post("/nilai/update/{id}", [App\Http\Controllers\NilaiKriteriaController::class, 'update'])->name("update-nilai-kriteria");
        Route::get("/nilai/delete/{id}", [App\Http\Controllers\NilaiKriteriaController::class, 'hapus'])->name("hapus-nilai-kriteria");
    });

    Route::prefix("/user")->group(function () {
        // User
        Route::get("/", [App\Http\Controllers\UserController::class, 'index'])->name("kriteria");
        Route::get("/create", [App\Http\Controllers\UserController::class, 'tambah'])->name("user-tambah");
        Route::post("/save", [App\Http\Controllers\UserController::class, 'simpan'])->name("user-simpan");
        Route::get("/edit/{id}", [App\Http\Controllers\UserController::class, 'edit'])->name("user-edit");
        Route::post("/update/{id}", [App\Http\Controllers\UserController::class, 'update'])->name("user-update");
        Route::get("/delete/{id}", [App\Http\Controllers\UserController::class, 'hapus'])->name("user-hapus");
    
    });
});

Route::prefix("/alternatif")->group(function () {
    Route::get("/", [App\Http\Controllers\AlternatifController::class, 'index'])->name("alternatif");
    Route::get("/create", [App\Http\Controllers\AlternatifController::class, 'tambah'])->name("alternatif-tambah");
    Route::post("/save", [App\Http\Controllers\AlternatifController::class, 'save'])->name("alternatif-simpan");
    Route::get("/edit/{id}", [App\Http\Controllers\AlternatifController::class, 'edit'])->name("alternatif-edit");
    Route::post("/update/{id}", [App\Http\Controllers\AlternatifController::class, 'update'])->name("alternatif-update");
    Route::get("/delete/{id}", [App\Http\Controllers\AlternatifController::class, 'hapus'])->name("alternatif-hapus");
});
Route::get('/perhitungan', [App\Http\Controllers\PerhitunganController::class, 'index'])->name('perhitungan');

Route::get('/password', [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordForm'])->name('show.change.password.form');
Route::post('/password', [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('change.password');
