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
    // Ambil data jadwal dari database (contoh)
    $schedule = DB::table('jadwal_mengajar')
        ->join('guru', 'jadwal_mengajar.guru_id', '=', 'guru.id')
        ->join('users', 'guru.user_id', '=', 'users.id')
        ->where('users.role', 'guru') // hanya ambil yang role-nya guru
        ->select(
            'jadwal_mengajar.hari',
            'jadwal_mengajar.jam',
            'guru.nama as nama_guru'
        )
        ->get();

    return view('guru.schedule', compact('schedule'));
}


}
