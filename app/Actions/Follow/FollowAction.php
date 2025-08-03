<?php

namespace App\Actions\Follow;

use App\Models\Contracts\Followable;
use App\Models\User;

final readonly class FollowAction
{
    public function execute(User $user, Followable $followable): void
    {
        if (! $followable->relationLoaded('followers')) {
            $followable->load('followers');
        }

        if (! $followable->followers->contains($user)) {
            $followable->followers()->attach($user);
        }
    }
}
