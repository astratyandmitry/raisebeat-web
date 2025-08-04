<?php

namespace App\Filament\Resources\Accelerators;

use App\Filament\Resources\Accelerators\Pages\CreateAccelerator;
use App\Filament\Resources\Accelerators\Pages\EditAccelerator;
use App\Filament\Resources\Accelerators\Pages\ListAccelerators;
use App\Filament\Resources\Accelerators\Pages\ViewAccelerator;
use App\Filament\Resources\Accelerators\Schemas\AcceleratorForm;
use App\Filament\Resources\Accelerators\Schemas\AcceleratorInfolist;
use App\Filament\Resources\Accelerators\Tables\AcceleratorsTable;
use App\Models\Accelerator;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcceleratorResource extends Resource
{
    protected static ?string $model = Accelerator::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AcceleratorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AcceleratorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcceleratorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAccelerators::route('/'),
            'create' => CreateAccelerator::route('/create'),
            'view' => ViewAccelerator::route('/{record}'),
            'edit' => EditAccelerator::route('/{record}/edit'),
        ];
    }
}
