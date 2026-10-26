<?php

use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFControlller;
use Illuminate\Support\Facades\Route;
use App\Exports\LayananExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pdfdatalayanan', [PDFControlller::class, 'generatepdf'])->name('datalayanan.pdf');
Route::get('exceldatalayanan', [LayananController::class, 'exportExcel'])->name('datalayanan.excel');

Route::resource('/layanan', LayananController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

