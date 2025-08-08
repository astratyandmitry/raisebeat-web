<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Resources\Pages\ManageRecords;

final class ManagePosts extends ManageRecords
{
    protected static string $resource = PostResource::class;
}
