<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratIzin; // Pastikan Anda mengimpor model SuratIzin
use Illuminate\Support\Facades\Storage; // Untuk menyimpan file

class SuratIzinController extends Controller
{
    public function create()
    {
        return view('Siswa.buat_surat'); // Tampilkan form untuk membuat surat izin
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'murid_id' => 'required|exists:murid,id', // Validasi murid_id
            'alasan' => 'required|string|max:255',
            'tujuan_surat' => 'required|string|max:255', // Validasi tujuan surat
            'file_surat' => 'required|file|mimes:pdf|max:2048', // Validasi file surat
        ]);

        // Simpan file surat jika ada
        $filePath = $request->file('file_surat')->store('surat_izin', 'public');

        // Simpan surat izin ke database
        SuratIzin::create([
            'murid_id' => $request->murid_id, // Ambil murid_id dari input
            'wali_kelas' => $request->tujuan_surat, // Ambil tujuan surat dari input
            'alasan' => $request->alasan,
            'file_surat' => $filePath, // Simpan path file surat
            'status' => 'Menunggu', // Pastikan ini adalah nilai yang valid
            'tanggal_pengajuan' => now(), // Tanggal pengajuan
            'tanggal_verifikasi' => null, // Belum diverifikasi
            'guru_verifikator' => null, // Belum ada verifikator
        ]);

        return redirect()->route('dashboard')->with('success', 'Surat izin berhasil diajukan.');
    }
}