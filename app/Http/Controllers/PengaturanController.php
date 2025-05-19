<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan halaman pengaturan
        return view('pengaturan.index'); // Pastikan view ini ada
    }

    public function update(Request $request)
    {
        // Logika untuk memperbarui pengaturan
    }
}
