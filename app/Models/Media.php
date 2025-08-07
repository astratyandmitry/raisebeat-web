<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Organization;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Followable;
use App\Models\Contracts\Linkable;
use App\Models\Contracts\Verifiable;
use App\Models\Contracts\Viewable;
use App\Models\Enums\MediaType;
use App\Models\Traits\HasFollowers;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasReceivedActivities;
use App\Models\Traits\HasVerifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read string|null $submission_url
 * @property-read \App\Models\Enums\MediaType $type
 */
final class Media extends Organization implements CanPerformActivity, CanReceiveActivity, Followable, Linkable, Verifiable, Viewable
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory, HasFollowers, HasLinks, HasPerformedActivities, HasReceivedActivities, HasVerifications;

    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'type' => MediaType::class,
        ];
    }
}
