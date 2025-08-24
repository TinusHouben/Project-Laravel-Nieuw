<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{

    public function run(): void
    {
        $category = FaqCategory::where('name', 'Algemeen')->first();

        if (!$category) {
            $this->command->error('FaqCategory "Algemeen" niet gevonden.');
            return;
        }

        Faq::create([
            'category_id' => $category->id,
            'question' => 'Hoe betrouwbaar is het nieuws?',
            'answer' => 'Het nieuws is zeer betrouwbaar.'
        ]);
    }
}
