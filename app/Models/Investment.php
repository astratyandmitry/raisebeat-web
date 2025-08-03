<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\Confirmable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read int $startup_id
 * @property-read string $investable_type
 * @property-read int $investable_id
 * @property-read int $year
 * @property-read string $quarter
 * @property-read float $amount_usd
 * @property-read \App\Models\Startup $startup
 * @property-read \App\Models\Contracts\Investable $investable
 */
final class Investment extends Model implements Confirmable
{
    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'amount_usd' => 'float',
            'is_confirmed' => 'boolean',
        ];
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }

    public function investable(): MorphTo
    {
        return $this->morphTo();
    }
}
