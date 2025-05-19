<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        return view('Siswa.presensi');
    }

    public function checkLocation(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Lokasi SMKN 3 Cimahi (contoh)
        $smkn3_lat = -6.863292;
        $smkn3_lng = 107.589597;
        $radius = 200; // dalam meter

        // Menghitung jarak antara dua titik (Haversine formula)
        $distance = $this->haversineDistance($latitude, $longitude, $smkn3_lat, $smkn3_lng);

        if ($distance <= $radius) {
            return response()->json(['message' => 'Presensi Berhasil', 'status' => 'success']);
        } else {
            return response()->json(['message' => 'Anda berada di luar area radius presensi!', 'status' => 'error']);
        }
    }

    private function haversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earth_radius = 6371000; // dalam meter

        $dlat = deg2rad($lat2 - $lat1);
        $dlon = deg2rad($lon2 - $lon1);

        $a = sin($dlat / 2) * sin($dlat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earth_radius * $c; // dalam meter
    }
}
