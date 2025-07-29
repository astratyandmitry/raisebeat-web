<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\SocialLinkType;

/**
 * @property-read string $social_linkable_type
 * @property-read string $social_linkable_id
 * @property-read string $url
 * @property-read \App\Models\Enums\SocialLinkType $type
 */
final class Link extends Model
{
    protected function casts(): array
    {
        return [
            'social_linkable_id' => 'integer',
            'type' => SocialLinkType::class,
        ];
    }
}
