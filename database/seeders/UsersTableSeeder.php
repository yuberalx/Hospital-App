<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Usuario 1',
            'cedula' => 123456,
            'tipo' => 1,
            'email' => 'usuario1@example.com',
            'password' => Hash::make('123456789'),
        ]);
    
        User::create([
            'name' => 'admin',
            'cedula' => 654321,
            'tipo' => 4,
            'email' => 'usuario2@example.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
