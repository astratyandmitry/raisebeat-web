<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $accelerator_id
 * @property-read int $startup_id
 * @property-read int $year
 * @property-read string $quarter
 * @property-read \App\Models\Accelerator $accelerator
 * @property-read \App\Models\Startup $startup
 */
final class AcceleratorParticipant extends Model
{
    protected function casts(): array
    {
        return [
            'year' => 'integer',
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
