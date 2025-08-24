<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{

    public function run(): void
    {
        FaqCategory::create([
            'name' => 'Algemeen',
        ]);
    }
}
