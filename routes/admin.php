<?php

use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('users', UsersController::class);

    Route::get('/pelayanan', [LayananController::class, 'index'])->name('pelayanan');
    Route::post('/pelayanan', [LayananController::class, 'store'])->name('pelayanan.store');
    Route::get('/pelayanan/detail/{layanan}', [LayananController::class, 'getDetailLayanan'])->name('detail.pelayanan');
    Route::post('/pelayanan/detail/{layanan}', [LayananController::class, 'addDetailLayanan'])->name('detail.pelayanan.add');
    Route::delete('/pelayanan/detail/{layanan}/{ketentuan}', [LayananController::class, 'deleteDetailLayanan'])->name('detail.pelayanan.destroy');

    Route::get('setting/remove/{id}', [SettingController::class, 'remove'])->name('setting.update');
    Route::get('setting', [SettingController::class, 'index'])->name('setting.update');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
});
