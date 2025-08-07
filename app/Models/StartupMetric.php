<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\Confirmable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $startup_id
 * @property-read int $year
 * @property-read string $quarter
 * @property-read float $value
 * @property-read \App\Models\Enums\MemberType $type
 */
final class StartupMetric extends Model implements Confirmable
{
    /** @use HasFactory<\Database\Factories\StartupMetricFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'value' => 'float',
            'is_confirmed' => 'boolean',
        ];
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }
}
