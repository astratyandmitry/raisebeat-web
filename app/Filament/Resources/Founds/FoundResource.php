<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds;

use App\Filament\Components\Organization\BaseOrganizationResource;
use App\Filament\Resources\Founds\Pages\ManageFounds;
use App\Filament\Resources\Founds\Schemas\FoundForm;
use App\Filament\Resources\Founds\Schemas\FoundInfolist;
use App\Filament\Resources\Founds\Schemas\FoundsTable;
use App\Models\Found;
use BackedEnum;

final class FoundResource extends BaseOrganizationResource
{
    protected static ?string $model = Found::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-presentation-chart-line';

    protected static ?int $navigationSort = 3;

    public static function getPages(): array
    {
        return [
            'index' => ManageFounds::route('/'),
        ];
    }

    protected static function getTableColumns(): array
    {
        return FoundsTable::columns();
    }

    protected static function getTableFilters(): array
    {
        return FoundsTable::filters();
    }

    protected static function getInfolistComponents(): array
    {
        return FoundInfolist::entries();
    }

    protected static function getFromComponents(): array
    {
        return FoundForm::fields();
    }
}
