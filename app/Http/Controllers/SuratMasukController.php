<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratIzin::all(); // atau filter by guru/wali kelas
        return view('guru.suratmasuk', compact('suratMasuk'));
    }


}