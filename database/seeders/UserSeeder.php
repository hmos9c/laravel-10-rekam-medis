<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sanas Febriyan',
            'email' => 'sanasfebriyan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
