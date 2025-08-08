<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\Confirmable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $accelerator_id
 * @property-read int $startup_id
 * @property-read int $year
 * @property-read string $quarter
 * @property-read boolean $is_confirmed
 * @property-read \App\Models\Accelerator $accelerator
 * @property-read \App\Models\Startup $startup
 */
final class AcceleratorParticipant extends Model implements Confirmable
{
    /** @use HasFactory<\Database\Factories\AcceleratorParticipantFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'is_confirmed' => 'boolean',
        ];
    }

    public function accelerator(): BelongsTo
    {
        return $this->belongsTo(Accelerator::class);
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }
}
