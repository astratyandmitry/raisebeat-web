<?php

declare(strict_types=1);

namespace App\Models\Abstracts;

use App\Models\Contracts\Linkable as LinkableContract;
use App\Models\Contracts\Verifiable as VerifiableContract;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasVerifications;

/**
 * @property-read string $slug
 * @property-read string $name
 * @property-read string|null $headline
 * @property-read string|null $description
 * @property-read string|null $logo_url
 * @property-read string|null $contact_website
 * @property-read string|null $contact_email
 * @property-read string|null $contact_phone
 * @property-read boolean $is_public
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
}
