<?php

use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
