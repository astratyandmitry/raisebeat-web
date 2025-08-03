<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Accelerator;
use App\Models\Found;
use App\Models\Investor;
use App\Models\Media;
use App\Models\Startup;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(100)->create();
        Investor::factory(20)->create();
        Accelerator::factory(10)->create();
        Found::factory(20)->create();
        Media::factory(10)->create();
        Startup::factory(50)->create();

        $this->call([
            DictionariesSeeder::class,
        ]);
    }
}
