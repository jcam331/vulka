<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ing. Jesús Camarillo',
            'email' => 'camarillocorp@gmail.com',
            'password' => Hash::make('1234AA'),
            'role' => 'superadmin',
            'profile_details' => [
                'age' => 48,
                'sex' => 'male'
            ],
            'phone' => '6568178266',
            'preferred_language' => 'es',
            'avatar' => 'avatars/default.png'
        ]);
    }
}
