<?php

declare(strict_types=1);

namespace App\Models\Contracts;

interface HasPublicUrl
{
    public function getPublicUrl(): string;
}
