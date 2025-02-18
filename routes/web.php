<?php

// routes/web.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardSiswaController; // Import controller DashboardSiswaController
use App\Http\Controllers\JadwalSiswaController; // Import controller JadwalSiswaController
use App\Http\Controllers\PresensiController; // Import controller PresensiController
use App\Http\Controllers\AkunController; // Import controller AkunController
use App\Http\Controllers\BuatSuratController; // Import controller BuatSuratController
use App\Http\Controllers\PengaturanController; // Import controller PengaturanController
use App\Http\Controllers\SuratIzinController; // Import controller SuratIzinController

Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan ke halaman login
});

// Route untuk halaman login
Route::get('/login', function () {
    return view('login'); // Ganti dengan nama view login Anda
})->name('login');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route untuk dashboard siswa
Route::get('/dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard')->middleware('auth'); // Pastikan hanya pengguna yang terautentikasi yang bisa mengakses

// Route untuk jadwal siswa
Route::get('/jadwal-siswa', [JadwalSiswaController::class, 'index'])->name('jadwal_siswa')->middleware('auth'); // Pastikan hanya pengguna yang terautentikasi yang bisa mengakses

// Route untuk presensi
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi')->middleware('auth'); // Pastikan hanya pengguna yang terautentikasi yang bisa mengakses

// Route untuk akun
Route::get('/akun', [AkunController::class, 'index'])->name('akun')->middleware('auth'); // Pastikan hanya pengguna yang terautentikasi yang bisa mengakses

// Route untuk update informasi akun
Route::post('/akun/update', [AkunController::class, 'update'])->name('akun.update')->middleware('auth'); // Route untuk memperbarui informasi murid

// Route untuk buat surat izin
Route::get('/surat-izin/create', [SuratIzinController::class, 'create'])->name('surat_izin.create')->middleware('auth'); // Pastikan hanya pengguna yang terautentikasi yang bisa mengakses
Route::post('/surat-izin', [SuratIzinController::class, 'store'])->name('surat_izin.store')->middleware('auth'); // Route untuk menyimpan surat izin

// Route untuk halaman pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan')->middleware('auth'); // Pastikan hanya pengguna yang terautentikasi yang bisa mengakses

// Route untuk update pengaturan
Route::post('/pengaturan/update', [PengaturanController::class, 'update'])->name('pengaturan.update')->middleware('auth'); // Route untuk memperbarui pengaturan pengguna

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Pastikan Anda memiliki metode logout di AuthController