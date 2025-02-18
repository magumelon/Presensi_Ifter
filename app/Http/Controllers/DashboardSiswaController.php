<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardSiswa; // Import model DashboardSiswa
use Illuminate\Support\Facades\DB; // Import DB facade untuk query builder

class DashboardSiswaController extends Controller
{
    public function index()
    {
        // Ambil ID murid yang sedang login
        $userId = auth()->id(); // Ambil ID pengguna yang sedang login
        
        // Ambil data kehadiran siswa
        $kehadiran = DashboardSiswa::where('murid_id', $userId)->get(); // Ambil data kehadiran untuk murid yang sedang login

        // Hitung jumlah hadir, izin, dan tanpa keterangan
        $jumlahHadir = $kehadiran->where('status', 'Hadir')->count();
        $jumlahIzin = $kehadiran->where('status', 'Izin')->count();
        $jumlahTanpaKeterangan = $kehadiran->where('status', 'Tanpa Keterangan')->count();

        // Ambil data murid tanpa model
        $murid = DB::table('murid')->where('user_id', $userId)->first(); // Menggunakan query builder untuk mengambil data murid

        // Debugging: Cek apakah data murid berhasil diambil
        if (!$murid) {
            dd('Murid tidak ditemukan untuk user_id: ' . $userId);
        }

        return view('Siswa.dashboard', compact('jumlahHadir', 'jumlahIzin', 'jumlahTanpaKeterangan', 'murid'));
    }
}