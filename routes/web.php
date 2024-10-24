<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstansiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\MentorController;

Route::resource('instansi', InstansiController::class);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/kehadiran', [KehadiranController::class, 'adminIndex'])->name('admin.kehadiran.adminIndex');
    Route::post('/kehadiran/checkin', [KehadiranController::class, 'checkIn'])->name('kehadirans.checkin');
    Route::post('/kehadiran/checkout/{id}', [KehadiranController::class, 'checkOut'])->name('kehadirans.checkout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/kehadirans', [KehadiranController::class, 'adminIndex'])->name('admin.kehadiran.index');
    Route::delete('/kehadirans/{id}', [KehadiranController::class, 'destroy'])->name('kehadirans.destroy');

    Route::resource('users', AdminUserController::class);
    Route::get('/admin/instansi', [InstansiController::class, 'index'])->name('admin.instansi.index');
    Route::get('/admin/mentor', [MentorController::class, 'index'])->name('admin.mentors.index');
    Route::get('/admin/mentor/create', [MentorController::class, 'index'])->name('admin.mentors.create');
});


require __DIR__ . '/auth.php';

require __DIR__ . '/admin-auth.php';
