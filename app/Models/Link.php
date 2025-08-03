<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\LinkType;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read string $linkable_type
 * @property-read string $linkable_id
 * @property-read string $url
 * @property-read \App\Models\Enums\LinkType $type
 * @property-read \App\Models\Contracts\Linkable $linkable
 */
final class Link extends Model
{
    protected function casts(): array
    {
        return [
            'type' => LinkType::class,
        ];
    }

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }
}
