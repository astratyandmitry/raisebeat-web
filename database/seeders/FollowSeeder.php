<?php

namespace Database\Seeders;

use App\Models\Accelerator;
use App\Models\Contracts\Followable;
use App\Models\Found;
use App\Models\Investor;
use App\Models\Media;
use App\Models\Startup;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

final class FollowSeeder extends Seeder
{
    private array $followable = [Accelerator::class, Investor::class, Found::class, Media::class, Startup::class];

    public function run(): void
    {
        User::query()->get()
            ->map(function (User $user): void {
                $alreadyFollowed = [];

                for ($i = 0; $i < rand(0, 10); $i++) {
                    /** @var \App\Models\Contracts\Followable $toFollow */
                    $followable = $this->getFollowable($alreadyFollowed);

                    $user->followings()->create([
                        'followable_type' => $followable::class,
                        'followable_id' => $followable->id,
                    ]);
                }
            });
    }

    private function getFollowable(array &$alreadyFollowed): Followable
    {
        do {
            $followable = Arr::random($this->followable)::query()->inRandomOrder()->first();
        } while (in_array($followable, $alreadyFollowed));

        $alreadyFollowed[] = $followable;

        return $followable;
    }
}
