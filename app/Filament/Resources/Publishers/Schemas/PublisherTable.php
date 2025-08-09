<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publishers\Schemas;

use App\Models\Enums\PublisherType;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

final class PublisherTable
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
                ->options(PublisherType::getOptions()),
        ];
    }
}
