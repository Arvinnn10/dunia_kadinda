<?php

use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/layanan', LayananController::class);
