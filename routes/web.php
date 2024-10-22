<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\PengajuanIzinUserController;
use App\Http\Controllers\PengajuanIzinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\Admin\TimWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group rute dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadirans.index');
    Route::post('/kehadiran/checkin', [KehadiranController::class, 'checkIn'])->name('kehadirans.checkin');
    Route::post('/kehadiran/checkout/{id}', [KehadiranController::class, 'checkOut'])->name('kehadirans.checkout');

    Route::get('/pengajuan-izin', [PengajuanIzinController::class, 'index'])->name('pengajuan_izin.index');
    Route::get('/pengajuan-izin/create', [PengajuanIzinController::class, 'create'])->name('pengajuan_izin.create');
    Route::post('/pengajuan-izin', [PengajuanIzinController::class, 'store'])->name('pengajuan_izin.store');

});

// Group rute dengan middleware auth:admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::put('/admin/password/update', [AdminProfileController::class, 'updatePassword'])->name('admin.password.update');
    Route::delete('/admin/profile/destroy', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');

    Route::get('/admin/kehadiran', [KehadiranController::class, 'adminIndex'])->name('admin.kehadiran.index');
    Route::delete('/kehadirans/{id}', [KehadiranController::class, 'destroy'])->name('kehadirans.destroy');

    Route::resource('/admin/instansi', InstansiController::class);
    Route::resource('/admin/mentors', MentorController::class);
    Route::resource('/admin/penugasan', PenugasanController::class);
    Route::resource('/admin/users', AdminUserController::class);
    Route::resource('/admin/tim_web', TimWebController::class);
    
    Route::get('/admin/users/search', [AdminUserController::class, 'search'])->name('admin.users.search');
    Route::get('/admin/pengajuan-izin', [PengajuanIzinUserController::class, 'index'])
    ->name('admin.pengajuan_izin.index');
    Route::get('/admin/pengajuan-izin', [PengajuanIzinUserController::class, 'index'])->name('admin.pengajuan_izin.index');

    Route::post('/admin/pengajuan-izin/{pengajuanIzin}/approve', [PengajuanIzinUserController::class, 'approve'])
    ->name('admin.pengajuan_izin.approve');
    Route::post('/admin/pengajuan-izin/{pengajuanIzin}/reject', [PengajuanIzinUserController::class, 'reject'])
    ->name('admin.pengajuan_izin.reject');

});

// Memasukkan file auth tambahan
require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
