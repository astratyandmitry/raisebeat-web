<?php

declare(strict_types=1);

namespace App\Actions\Follow;

use App\Models\Contracts\Followable;
use App\Models\User;

final readonly class UnfollowAction
{
    public function execute(User $user, Followable $followable): void
    {
        $followable->followers()->detach($user);
    }
}
