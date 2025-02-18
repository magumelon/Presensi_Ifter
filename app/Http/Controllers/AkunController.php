<?php

namespace App\Http\Controllers;

use App\Models\Murid; // Import model Murid
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        
        // Ambil data murid berdasarkan user_id
        $murid = Murid::where('user_id', $user->id)->first();

        // Cek apakah data murid ada
        if (!$murid) {
            return redirect()->route('dashboard')->with('error', 'Data murid tidak ditemukan.');
        }

        return view('Siswa.akun', compact('user', 'murid')); // Mengirim data pengguna dan murid ke view
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'nisn' => 'required|string|max:10|unique:murid,nisn,' . Auth::user()->murid->id,
        ]);

        // Ambil data murid
        $murid = Murid::where('user_id', Auth::id())->first();

        // Cek apakah data murid ada
        if (!$murid) {
            return redirect()->route('akun')->with('error', 'Data murid tidak ditemukan.');
        }

        // Update data murid
        $murid->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
        ]);

        return redirect()->route('akun')->with('success', 'Informasi berhasil diperbarui.');
    }
}