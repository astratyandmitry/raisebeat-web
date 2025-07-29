<?php

namespace Database\Seeders;

use App\Models\Dictionaries\StartupCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class StartupCategorySeeder extends DictionarySeeder
{
    protected array $data = [
        'b2b' => 'B2B',
        'b2c' => 'B2C',
        'b2g' => 'B2G',
        'c2c' => 'C2C',
        'p2p' => 'P2P',
        'saas' => 'SaaS',
    ];

    protected function getModelClassName(): string
    {
        return StartupCategory::class;
    }
}
