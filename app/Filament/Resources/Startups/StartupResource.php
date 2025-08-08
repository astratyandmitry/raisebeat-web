<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups;

use App\Filament\Components\Organization\BaseOrganizationResource;
use App\Filament\Resources\Startups\Pages\ManageStartups;
use App\Filament\Resources\Startups\Schemas\StartupForm;
use App\Filament\Resources\Startups\Schemas\StartupInfolist;
use App\Filament\Resources\Startups\Schemas\StartupTable;
use App\Models\Startup;
use BackedEnum;

final class StartupResource extends BaseOrganizationResource
{
    protected static ?string $model = Startup::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-rocket-launch';

    protected static ?int $navigationSort = 1;

    public static function getPages(): array
    {
        return [
            'index' => ManageStartups::route('/'),
        ];
    }

    protected static function getTableColumns(): array
    {
        return StartupTable::columns();
    }

    protected static function getTableFilters(): array
    {
        return StartupTable::filters();
    }

    protected static function getInfolistComponents(): array
    {
        return StartupInfolist::entries();
    }

    protected static function getFromComponents(): array
    {
        return StartupForm::fields();
    }
}
