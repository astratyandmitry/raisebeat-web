<?php

declare(strict_types=1);

namespace App\Actions\Activity;

use App\Models\Activity;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Enums\ActivityType;

final readonly class LogActivityAction
{
    public function execute(
        CanPerformActivity $performer,
        ActivityType $type,
        ?CanReceiveActivity $subject,
        ?array $data = [],
    ): Activity {
        return $performer->performed_activities()->create([
            'user_id' => $performer->performer_user_id(),
            'subjectable_type' => $subject ? $subject::class : null,
            'subjectable_id' => $subject?->getKey(),
            'type' => $type,
            'data' => $data,
        ]);
    }
}
