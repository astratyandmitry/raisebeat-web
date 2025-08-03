<?php

declare(strict_types=1);

namespace App\Actions\Verification;

use App\Models\Contracts\Verifiable;
use App\Models\Enums\VerificationStatus;
use App\Models\Verification;

final readonly class RequestVerificationAction
{
    public function execute(Verifiable $verifiable): ?Verification
    {
        $latestVerification = $verifiable->verifications_history()->latest()->first();

        if ($latestVerification && $latestVerification->status === VerificationStatus::ACCEPTED) {
            return null;
        }

        if ($latestVerification && $latestVerification->status === VerificationStatus::PENDING) {
            $latestVerification->delete();
        }

        return $verifiable->verifications_history()->create([
            'status' => VerificationStatus::PENDING,
            'requested_at' => now(),
        ]);
    }
}
