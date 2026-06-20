<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Data Admin Default
        User::create([
            'name'     => 'Administrator Utama',
            'username' => 'admin',
            'email'    => 'admin@tahfidz.com',
            'password' => Hash::make('admin123'), 
            'role'     => 'admin',
        ]);

        // Contoh data Guru untuk testing
        User::create([
            'name'     => 'Ustazah Guru',
            'username' => 'guru_tahfidz',
            'email'    => 'guru@tahfidz.com',
            'password' => Hash::make('password123'),
            'role'     => 'guru',
        ]);
    }
}