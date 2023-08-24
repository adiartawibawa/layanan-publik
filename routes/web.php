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
