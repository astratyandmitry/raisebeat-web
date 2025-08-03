<?php

declare(strict_types=1);

namespace App\Actions\Verification;

use App\Models\Enums\VerificationStatus;
use App\Models\Verification;

final readonly class RejectVerificationAction
{
    public function execute(Verification $verification, string $comment): Verification
    {
        $verification->update([
            'status' => VerificationStatus::REJECTED,
            'responded_at' => now(),
            'comment' => $comment,
        ]);

        return $verification;
    }
}
