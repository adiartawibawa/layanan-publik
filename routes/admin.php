<?php

use App\Http\Controllers\Admin\LayananController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/pelayanan', [LayananController::class, 'index'])->name('admin.pelayanan');
    Route::post('/pelayanan', [LayananController::class, 'store'])->name('admin.pelayanan.store');

    Route::get('/pelayanan/detail/{layanan}', [LayananController::class, 'getDetailLayanan'])->name('admin.detail.pelayanan');

    Route::get('/setting', function () {
        return view('admin.setting.index');
    })->name('admin.setting');
});
