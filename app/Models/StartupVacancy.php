<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Viewable;
use App\Models\Enums\VacancyType;
use App\Models\Traits\HasReceivedActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $startup_id
 * @property-read string $title
 * @property-read string $description
 * @property-read string $content
 * @property-read string $feedback_email
 * @property-read boolean $is_applicable
 * @property-read \App\Models\Enums\VacancyType $type
 * @property-read \App\Models\Startup $startup
 */
final class StartupVacancy extends Model implements Viewable, CanReceiveActivity
{
    /** @use HasFactory<\Database\Factories\StartupVacancyFactory> */
    use HasReceivedActivities, HasFactory;

    protected function casts(): array
    {
        return [
            'type' => VacancyType::class,
            'is_applicable' => 'boolean',
        ];
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }
}
