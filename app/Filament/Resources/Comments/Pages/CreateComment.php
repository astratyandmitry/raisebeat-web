<?php

declare(strict_types=1);

namespace App\Filament\Resources\Comments\Pages;

use App\Filament\Resources\Comments\CommentResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
