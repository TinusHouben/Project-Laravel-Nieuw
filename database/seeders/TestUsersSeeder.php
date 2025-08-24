<?php

//seeder om gebruikers aan te maken.

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUsersSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@user.com',
            'password' => Hash::make('User123'),
            'birthday' => '1996-10-01',
            'about_me' => 'User1',
        ]);

        User::factory()->create([
            'name' => 'User2',
            'email' => 'user2@user.com',
            'password' => Hash::make('User456'),
            'birthday' => '2001-09-11',
            'about_me' => 'User2',
        ]);
    }
}
