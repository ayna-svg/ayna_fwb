<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Dashboard::class, 'index'])->name('home');
Route::get('/regis', [RegisController::class, 'tampil_regis'])->name('regis');
Route::post('/kirim', [RegisController::class, 'kirim_data'])->name('kirim');
//login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('kirimdata');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//pupuk
Route::get('/pupuk',[PupukController::class,'index'])->name('pupuk');
Route::get('/input',[PupukController::class,'create'])->name('input_data');
Route::post('/kirim_pupuk',[PupukController::class,'store'])->name('kirim_pupuk');
