<?php

declare(strict_types=1);

namespace App\Actions\Confirmation;

use App\Models\Contracts\Confirmable;

final readonly class ConfirmAction
{
    public function execute(Confirmable $confirmable): bool
    {
        return $confirmable->update([
            'is_confirmed' => true,
        ]);
    }
}
