<?php

// admin account seeder

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
        'name' => 'admin',
        'email' => 'admin@ehb.be',
        'password' => Hash::make('Password!321'),
        'birthday' => '2006-12-02',
        'about_me' => 'admin account',
        'role' => 'admin',
        ]);
    }
}
