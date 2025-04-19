<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardGuruController extends Controller
{
    public function index()
    {
        return view('guru.dashboard_guru'); // Pastikan view `dashboard_guru.blade.php` ada di folder resources/views
    }
}
