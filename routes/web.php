<?php

use App\Http\Controllers\RegisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

Route::get('/regis', function () {
    return 'Ini halaman register';
});

Route::get('/', function () {
    return view('tes');
});

Route::get('/', [Dashboard::class, 'index']);
Route::get('/admin', [Dashboard::class, 'index admin']);

Route::get('/regis', [Dashboard::class, 'tampil_regis'])->name('regis');
Route::get('/regis', [Dashboard::class, 'kirim_data'])->name('kirim');