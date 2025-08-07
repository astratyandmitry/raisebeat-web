<?php

namespace App\Models\Contracts;

interface HasPublicUrl
{
    public function getPublicUrl(): string;
}
