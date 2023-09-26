<?php

use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PanduanController;
use App\Http\Controllers\Admin\PermohonanController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    Route::resource('users', UsersController::class);

    // Layanan
    Route::view('layanan', 'admin.layanan.index')->name('layanan.index');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/detail/{layanan}', [LayananController::class, 'getDetailLayanan'])->name('detail.layanan');
    Route::post('/layanan/detail/{layanan}', [LayananController::class, 'addDetailLayanan'])->name('detail.layanan.add');
    Route::delete('/layanan/detail/{layanan}/{ketentuan}', [LayananController::class, 'deleteDetailLayanan'])->name('detail.layanan.destroy');

    // Permohonan Masuk
    Route::get('permohonan/{permohonan}/{notification?}', [PermohonanController::class, 'show'])->name('permohonan.notification');
    Route::get('permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');
    Route::post('permohonan', [PermohonanController::class, 'store'])->name('permohonan.store');
    Route::get('permohonan/{permohonan}', [PermohonanController::class, 'show'])->name('permohonan.show');

    Route::get('setting/remove/{id}', [SettingController::class, 'remove'])->name('setting.update');
    Route::get('setting', [SettingController::class, 'index'])->name('setting.update');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');

    // Panduan
    Route::get('panduan', [PanduanController::class, 'index'])->name('panduan');
});
