<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface RelaterToUser
{
    public function user(): BelongsTo;
}
