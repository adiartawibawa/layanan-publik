<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermohonanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:User'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('permohonan', PermohonanController::class);
    Route::get('/permohonan/riwayat/{permohonan?}/{notification?}', [PermohonanController::class, 'riwayat'])->name('permohonan.riwayat');
});
