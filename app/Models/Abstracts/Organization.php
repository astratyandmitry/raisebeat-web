<?php

declare(strict_types=1);

namespace App\Models\Abstracts;

use App\Models\Contracts\Linkable as LinkableContract;
use App\Models\Contracts\Verifiable as VerifiableContract;
use App\Models\Member;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasVerifications;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @property-read boolean $is_public
 * @property-read \App\Models\User $owner
 */
abstract class Organization extends Model implements VerifiableContract, LinkableContract
{
    use HasVerifications, HasLinks;

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}
