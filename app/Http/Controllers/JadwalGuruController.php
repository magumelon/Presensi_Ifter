<?php

namespace App\Http\Controllers;
use App\Models\JadwalGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalGuruController extends Controller
{
    public function index()
    {
        $schedule = JadwalGuru::where('guru_id', auth()->user()->id)
                              ->with(['kelas'])
                              ->get();

        return view('guru.schedule', compact('schedule'));
    }
    public function showSchedule()
{
    // Mengambil data wali kelas dan kelas yang dipimpin oleh wali kelas tersebut
    $schedule = DB::table('wali_kelas')
        ->join('guru', 'wali_kelas.guru_id', '=', 'guru.id') // Menghubungkan dengan tabel guru untuk nama wali kelas
        ->join('kelas', 'wali_kelas.kelas_id', '=', 'kelas.id') // Menghubungkan dengan tabel kelas untuk nama kelas
        ->select(
            'kelas.nama_kelas',        // Menampilkan nama kelas
            'guru.nama as nama_guru'   // Menampilkan nama wali kelas
        )
        ->get();

    return view('guru.schedule', compact('schedule'));
}
}
