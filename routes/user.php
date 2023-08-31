<?php

use App\Http\Controllers\PermohonanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:User'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('permohonan', PermohonanController::class);
});
