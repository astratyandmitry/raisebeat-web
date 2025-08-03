<?php

namespace App\Actions\Follow;

use App\Models\Contracts\Followable;

final class FollowAction
{
    public function execute(int $userId, Followable $followable): void
    {
        if (! $followable->relationLoaded('followers')) {
            $followable->load('followers');
        }

        if (! $followable->followers->contains($userId)) {
            $followable->followers()->attach($userId);
        }
    }
}
