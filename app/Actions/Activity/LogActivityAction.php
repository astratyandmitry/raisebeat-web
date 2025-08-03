<?php

namespace App\Actions\Activity;

use App\Models\Activity;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Enums\ActivityType;

final readonly class LogActivityAction
{
    public function execute(
        CanPerformActivity $performer,
        CanReceiveActivity $subject,
        ActivityType $type,
        ?array $data = [],
    ): Activity {
        return $performer->performed_activities()->create([
            'subjectable_type' => $subject::class,
            'subjectable_id' => $subject->getKey(),
            'type' => $type,
            'data' => $data,
        ]);
    }
}
