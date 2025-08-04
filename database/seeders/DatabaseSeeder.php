<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Accelerator;
use App\Models\AcceleratorParticipant;
use App\Models\Comment;
use App\Models\Found;
use App\Models\Investment;
use App\Models\Investor;
use App\Models\Link;
use App\Models\Media;
use App\Models\Member;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Startup;
use App\Models\StartupMetric;
use App\Models\StartupVacancy;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(100)
            ->has(Notification::factory(10))
            ->create();

        Startup::factory(50)
            ->has(Verification::factory(), 'verifications_history')
            ->has(Member::factory(5))
            ->has(Link::factory(3))
            ->has(StartupMetric::factory(3), 'metrics')
            ->has(StartupVacancy::factory(1), 'vacancies')
            ->has(Post::factory(3)->has(Comment::factory(3)))
            ->create();

        Investor::factory(20)
            ->has(Verification::factory(), 'verifications_history')
            ->has(Investment::factory(2))
            ->has(Post::factory(1)->has(Comment::factory(3))->as_repost())
            ->create();

        Accelerator::factory(10)
            ->has(Verification::factory(), 'verifications_history')
            ->has(AcceleratorParticipant::factory(4), 'participators')
            ->has(Member::factory(2))
            ->has(Investment::factory(5))
            ->has(Link::factory(5))
            ->has(Post::factory(4)->has(Comment::factory(3)))
            ->create();

        Found::factory(20)
            ->has(Verification::factory(), 'verifications_history')
            ->has(Member::factory(2))
            ->has(Investment::factory(10))
            ->has(Link::factory(2))
            ->has(Post::factory(2)->has(Comment::factory(3)))
            ->create();

        Media::factory(10)
            ->has(Verification::factory(), 'verifications_history')
            ->has(Link::factory(3))
            ->has(Member::factory(1))
            ->has(Post::factory(4)->has(Comment::factory(3))->as_external())
            ->create();

        $this->call([
            AdminSeeder::class,
            DictionariesSeeder::class,
        ]);
    }
}
