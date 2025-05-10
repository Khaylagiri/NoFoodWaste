<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'username' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'phone_number' => '08123456789',
            'address' => 'Jakarta',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Donator user
        User::create([
            'username' => 'Donator User',
            'email' => 'donator@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'donator',
            'phone_number' => '08123456790',
            'address' => 'Bandung',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Penerima user
        User::create([
            'username' => 'Penerima User',
            'email' => 'penerima@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'penenrima', // Sesuai dengan enum di database
            'phone_number' => '08123456791',
            'address' => 'Surabaya',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
