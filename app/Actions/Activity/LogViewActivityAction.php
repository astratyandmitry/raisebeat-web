<?php

declare(strict_types=1);

namespace App\Actions\Activity;

use App\Models\Activity;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Viewable;
use App\Models\Enums\ActivityType;
use Illuminate\Support\Facades\DB;

final readonly class LogViewActivityAction
{
    public function action(CanPerformActivity $performer, CanReceiveActivity&Viewable $subject): Activity
    {
        DB::beginTransaction();

        $activity = $performer->performed_activities()->create([
            'user_id' => $performer->performer_user_id(),
            'subjectable_type' => $subject::class,
            'subjectable_id' => $subject->getKey(),
            'type' => ActivityType::View,
        ]);

        $subject->update([
            'count_views' => $subject->count_views + 1,
        ]);

        DB::commit();

        return $activity;
    }
}
