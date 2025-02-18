<?php

namespace App\Http\Controllers;

use App\Models\JadwalKelas;
use Illuminate\Http\Request;

class JadwalSiswaController extends Controller
{
    public function index()
    {
        // Ambil semua jadwal kelas beserta informasi guru
        $jadwal = JadwalKelas::with('guru')->get();

        // Cek apakah ada jadwal yang ditemukan
        if ($jadwal->isEmpty()) {
            // Jika tidak ada jadwal, Anda bisa mengembalikan pesan atau view yang sesuai
            return view('Siswa.jadwal_siswa', ['jadwal' => [], 'message' => 'Tidak ada jadwal yang tersedia.']);
        }

        // Mengirim data ke view
        return view('Siswa.jadwal_siswa', compact('jadwal'));
    }
}