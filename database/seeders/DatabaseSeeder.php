<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Accelerator;
use App\Models\Found;
use App\Models\Investor;
use App\Models\Link;
use App\Models\Media;
use App\Models\Startup;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(100)->create();
        Investor::factory(20)->has(Verification::factory(), 'verifications_history')->create();
        Accelerator::factory(10)->has(Verification::factory(), 'verifications_history')->create();
        Found::factory(20)->has(Verification::factory(), 'verifications_history')->create();
        Media::factory(10)->has(Verification::factory(), 'verifications_history')->has(Link::factory(3))->create();
        Startup::factory(50)->has(Verification::factory(), 'verifications_history')->create();

        $this->call([
            DictionariesSeeder::class,
        ]);
    }
}
