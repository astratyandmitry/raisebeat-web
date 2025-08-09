<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publishers;

use App\Filament\Components\Organization\BaseOrganizationResource;
use App\Filament\Resources\Publishers\Pages\ManagePublishers;
use App\Filament\Resources\Publishers\Schemas\PublisherForm;
use App\Filament\Resources\Publishers\Schemas\PublisherInfolist;
use App\Filament\Resources\Publishers\Schemas\PublisherTable;
use App\Models\Publisher;
use BackedEnum;

final class PublisherResource extends BaseOrganizationResource
{
    protected static ?string $model = Publisher::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?int $navigationSort = 4;

    public static function getPages(): array
    {
        return [
            'index' => ManagePublishers::route('/'),
        ];
    }

    protected static function getTableColumns(): array
    {
        return PublisherTable::columns();
    }

    protected static function getTableFilters(): array
    {
        return PublisherTable::filters();
    }

    protected static function getInfolistComponents(): array
    {
        return PublisherInfolist::entries();
    }

    protected static function getFromComponents(): array
    {
        return PublisherForm::fields();
    }
}
