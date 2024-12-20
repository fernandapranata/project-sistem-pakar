<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat atau perbarui user dengan role admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Cek berdasarkan email
            [
                'name' => 'Mimin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // Buat atau perbarui user dengan role user
        User::updateOrCreate(
            ['email' => 'fernan@gmail.com'], // Cek berdasarkan email
            [
                'name' => 'Fernanda Pranata',
                'password' => Hash::make('fernan123'),
                'role' => 'user',
            ]
        );
    }
}
