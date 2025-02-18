<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk logging

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Log percobaan login
        Log::info('Login attempt', ['username' => $request->username]);

        // Mencari pengguna berdasarkan username
        $user = User::where('username', $request->username)->first();

        if ($user) {
            Log::info('User  found', ['user' => $user]);

            // Memeriksa apakah password cocok
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return response()->json(['message' => 'Selamat datang ' . $user->username, 'redirect' => route('dashboard')]);
            } else {
                Log::warning('Password mismatch', ['username' => $request->username]);
            }
        } else {
            Log::warning('User  not found', ['username' => $request->username]);
        }

        return response()->json(['message' => 'Username / Password salah'], 401);
    }

    public function logout(Request $request)
    {
        // Logika untuk logout
        Auth::logout();
        return redirect()->route('login'); // Mengarahkan kembali ke halaman login setelah logout
    }

    public function dashboard()
    {
        return view('dashboard'); // Ganti dengan view dashboard yang sesuai
    }
}