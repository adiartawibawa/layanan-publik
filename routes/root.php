<?php

use Illuminate\Support\Facades\Route;

Route::middleware('role:Root')->prefix('root')->name('root.')->group(function () {
    Route::view('/dashboard', 'root.dashboard')->name('dashboard');
});
