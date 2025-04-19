<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        if ($user) {
            Log::info('User found', ['user' => $user]);

            // Cek password
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                // Arahkan berdasarkan role
                if ($user->role === 'murid') {
                    return response()->json([
                        'message' => 'Selamat datang murid ' . $user->username,
                        'redirect' => route('dashboard')
                    ]);
                } elseif ($user->role === 'guru') {
                    return response()->json([
                        'message' => 'Selamat datang guru ' . $user->username,
                        'redirect' => route('dashboard.guru')
                    ]);
                } else {
                    // Role tidak dikenal
                    Auth::logout();
                    return response()->json(['message' => 'Role tidak dikenali. Hubungi admin.'], 403);
                }
            } else {
                Log::warning('Password mismatch', ['username' => $request->username]);
            }
        } else {
            Log::warning('User not found', ['username' => $request->username]);
        }

        return response()->json(['message' => 'Username / Password salah'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
