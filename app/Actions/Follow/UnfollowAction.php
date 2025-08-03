<?php

namespace App\Actions\Follow;

use App\Models\Contracts\Followable;

final class UnfollowAction
{
    public function execute(int $userId, Followable $followable): void
    {
        $followable->followers()->detach($userId);
    }
}
