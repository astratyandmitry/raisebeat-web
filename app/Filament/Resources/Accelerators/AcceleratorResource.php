<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators;

use App\Filament\Components\Organization\BaseOrganizationResource;
use App\Filament\Resources\Accelerators\Pages\ManageAccelerators;
use App\Filament\Resources\Accelerators\Schemas\AcceleratorForm;
use App\Filament\Resources\Accelerators\Schemas\AcceleratorInfolist;
use App\Filament\Resources\Accelerators\Schemas\AcceleratorsTable;
use App\Models\Accelerator;
use BackedEnum;

final class AcceleratorResource extends BaseOrganizationResource
{
    protected static ?string $model = Accelerator::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 2;

    public static function getPages(): array
    {
        return [
            'index' => ManageAccelerators::route('/'),
        ];
    }

    protected static function getTableColumns(): array
    {
        return AcceleratorsTable::columns();
    }

    protected static function getTableFilters(): array
    {
        return AcceleratorsTable::filters();
    }

    protected static function getInfolistComponents(): array
    {
        return AcceleratorInfolist::entries();
    }

    protected static function getFromComponents(): array
    {
        return AcceleratorForm::fields();
    }
}
