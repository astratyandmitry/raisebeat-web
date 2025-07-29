<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DictionariesSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StartupCategorySeeder::class,
            StartupIndustrySeeder::class,
            StartupTechnologySeeder::class,
            StartupProductTypeSeeder::class,
        ]);
    }
}
