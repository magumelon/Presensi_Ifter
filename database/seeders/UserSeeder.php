<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'agung',
            'password' => Hash::make('agung123'),
            'role' => 'guru',
        ]);

        User::create([
            'username' => 'definaa',
            'password' => Hash::make('def123'),
            'role' => 'guru',
        ]);

        User::create([
            'username' => 'lutfi',
            'password' => Hash::make('lutfi123'),
            'role' => 'murid',
        ]);
    }
}

