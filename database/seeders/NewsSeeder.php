<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{

    public function run(): void
    {
        News::create([
            'title' => 'Bosbranden in Spanje',
            'content' => 'Er zijn bosbranden in Spanje.',
            'image' => null, 
            'published_at' => now(),
        ]);
    }
}
