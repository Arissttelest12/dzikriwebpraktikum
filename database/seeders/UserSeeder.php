<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mahasiswa
        User::create([
            'npm' => 12345678,
            'username' => 'mahasiswa',
            'first_name' => 'Mahasiswa',
            'last_name' => 'User',
            'email' => 'mahasiswa@unsur.ac.id',
            'password' => Hash::make('12345678'),
        ])->assignRole('mahasiswa');

        // Pustakawan
        User::create([
            'npm' => 87654321,
            'username' => 'pustakawan',
            'first_name' => 'Pustaka',
            'last_name' => 'Wan',
            'email' => 'pustakawan@unsur.ac.id',
            'password' => Hash::make('12345678'),
        ])->assignRole('pustakawan');
    }
    }

