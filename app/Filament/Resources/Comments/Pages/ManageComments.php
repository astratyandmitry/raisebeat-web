<?php

declare(strict_types=1);

namespace App\Filament\Resources\Comments\Pages;

use App\Filament\Resources\Comments\CommentResource;
use Filament\Resources\Pages\ListRecords;

final class ManageComments extends ListRecords
{
    protected static string $resource = CommentResource::class;
}
