<?php

declare(strict_types=1);

namespace App\Filament\Resources\Media\Schemas;

use App\Models\Enums\MediaType;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

final class MediaTable
{
    public static function columns(): array
    {
        return [
            TextColumn::make('type')
                ->width(80)
                ->color('gray')
                ->badge(),
        ];
    }

    public static function filters(): array
    {
        return [
            SelectFilter::make('type')
                ->options(MediaType::getOptions()),
        ];
    }
}
