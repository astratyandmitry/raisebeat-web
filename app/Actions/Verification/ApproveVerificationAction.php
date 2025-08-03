<?php

declare(strict_types=1);

namespace App\Actions\Verification;

use App\Models\Enums\VerificationStatus;
use App\Models\Verification;

final readonly class ApproveVerificationAction
{
    public function execute(Verification $verification): Verification
    {
        $verification->update([
            'status' => VerificationStatus::ACCEPTED,
            'responded_at' => now(),
        ]);

        return $verification;
    }
}
