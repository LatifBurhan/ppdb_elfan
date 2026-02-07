<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Akun Admin
        User::create([
            'name' => 'Admin Elfan Academy',
            'email' => 'admin@elfan.com',
            'password' => Hash::make('admin123'), 
            'role' => 'admin',
        ]);

        // Opsi: Membuat Akun Siswa untuk testing
        User::create([
            'name' => 'Siswa Test',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
    }
}
