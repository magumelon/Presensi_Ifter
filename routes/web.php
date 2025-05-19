<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\JadwalSiswaController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BuatSuratController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\SuratIzinController;
use App\Http\Controllers\DashboardGuruController;
use App\Http\Controllers\JadwalGuruController;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Halaman login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// ===========================
// Route untuk akun (umum - berlaku untuk role murid dan guru)
// ===========================
Route::get('/akun', [AkunController::class, 'index'])->name('akun.siswa');  // Rute untuk siswa
// Route::post('/akun/update', [AkunController::class, 'update'])->name('akun.update');

 // Route untuk akun guru
Route::get('/akun/guru', [AkunController::class, 'akunGuru'])->name('akun.guru');  // Rute untuk guru
// Route::post('/akun/guru/update', [AkunController::class, 'updateGuru'])->name('akun.guru.update');

// ===========================
// Route khusus MURID
// ===========================
Route::middleware(['auth', 'role:murid'])->group(function () {
    Route::get('/dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard');
    
    // Route untuk halaman akun siswa
    //Route::get('/akun', [AkunController::class, 'index'])->name('akun.siswa');
    Route::get('/jadwal-siswa', [JadwalSiswaController::class, 'index'])->name('jadwal_siswa');
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi');
    Route::post('/presensi/check-location', [PresensiController::class, 'checkLocation']);
    Route::post('/akun/update', [AkunController::class, 'update'])->name('akun.update');
    Route::get('/surat-izin/create', [SuratIzinController::class, 'create'])->name('surat_izin.create');
    Route::post('/surat-izin', [SuratIzinController::class, 'store'])->name('surat_izin.store');
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::post('/pengaturan/update', [PengaturanController::class, 'update'])->name('pengaturan.update');
});

// ===========================
// Route khusus GURU
// ===========================
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/dashboard-guru', [DashboardGuruController::class, 'index'])->name('dashboard.guru');
    Route::get('/jadwal-guru', [JadwalGuruController::class, 'index'])->name('jadwal.guru');
    Route::get('/schedule', [JadwalGuruController::class, 'showSchedule'])->name('schedule.index');

    // Melihat akun guru
    //Route::get('/akun', [AkunController::class, 'akunGuru'])->name('akun.guru');
    Route::post('/akun/guru/update', [AkunController::class, 'updateGuru'])->name('akun.guru.update');
});

// ===========================
// Logout (berlaku umum)
// ===========================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
