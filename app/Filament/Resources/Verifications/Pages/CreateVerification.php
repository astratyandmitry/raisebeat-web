<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Pages;

use App\Filament\Resources\Verifications\VerificationResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateVerification extends CreateRecord
{
    protected static string $resource = VerificationResource::class;
}
