<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SwitchRoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/panduan/registrasi', 'page.panduan-registrasi')->name('panduan.registrasi');
Route::view('/panduan/permohonan', 'page.panduan-permohonan')->name('panduan.permohonan');
Route::view('/panduan/ambil-berkas', 'page.panduan-ambil-berkas')->name('panduan.berkas');
Route::view('/check/permohonan', 'page.cek-permohonan')->name('cek.permohonan');
Route::view('/daftar-layanan', 'page.daftar-layanan')->name('daftar.layanan');

Route::middleware('auth', 'verified')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/switch-role/{role}', SwitchRoleController::class)->name('switch.role');

    // Admin
    require __DIR__ . '/admin.php';

    // Root
    require __DIR__ . '/root.php';

    // User
    require __DIR__ . '/user.php';
});

require __DIR__ . '/auth.php';
