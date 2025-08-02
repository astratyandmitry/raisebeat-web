<?php

declare(strict_types=1);

namespace Database\Seeders;

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
