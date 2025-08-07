<?php

declare(strict_types=1);

namespace App\Models\Abstracts;

use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Linkable;
use App\Models\Contracts\Postable;
use App\Models\Contracts\RelaterToUser;
use App\Models\Contracts\Verifiable;
use App\Models\Member;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasPosts;
use App\Models\Traits\HasReceivedActivities;
use App\Models\Traits\HasVerifications;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read int $user_id
 * @property-read string $slug
 * @property-read string $name
 * @property-read string|null $headline
 * @property-read string|null $description
 * @property-read string|null $logo_url
 * @property-read string|null $contact_website
 * @property-read string|null $contact_email
 * @property-read string|null $contact_phone
 * @property-read bool $is_public
 * @property-read \App\Models\User $user
 */
abstract class Organization extends Model implements CanPerformActivity, CanReceiveActivity, Linkable, Postable, Verifiable, RelaterToUser
{
    use HasLinks, HasPerformedActivities, HasPosts, HasReceivedActivities, HasVerifications;

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function members(): MorphMany
    {
        return $this->morphMany(Member::class, 'organization');
    }

    public function getDisplayLabel(): string
    {
        return $this->name;
    }
}
