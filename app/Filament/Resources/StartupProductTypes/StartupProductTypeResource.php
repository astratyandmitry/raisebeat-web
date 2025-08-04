<?php

namespace App\Filament\Resources\StartupProductTypes;

use App\Filament\Resources\StartupProductTypes\Pages\CreateStartupProductType;
use App\Filament\Resources\StartupProductTypes\Pages\EditStartupProductType;
use App\Filament\Resources\StartupProductTypes\Pages\ListStartupProductTypes;
use App\Filament\Resources\StartupProductTypes\Pages\ViewStartupProductType;
use App\Filament\Resources\StartupProductTypes\Schemas\StartupProductTypeForm;
use App\Filament\Resources\StartupProductTypes\Schemas\StartupProductTypeInfolist;
use App\Filament\Resources\StartupProductTypes\Tables\StartupProductTypesTable;
use App\Models\Dictionaries\StartupProductType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StartupProductTypeResource extends Resource
{
    protected static ?string $model = StartupProductType::class;

    protected static null|string|\UnitEnum $navigationGroup = 'Dictionaries';

    protected static ?string $recordTitleAttribute = 'Startup Product Type';

    public static function form(Schema $schema): Schema
    {
        return StartupProductTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StartupProductTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupProductTypesTable::configure($table);
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
            'index' => ListStartupProductTypes::route('/'),
            'create' => CreateStartupProductType::route('/create'),
            'view' => ViewStartupProductType::route('/{record}'),
            'edit' => EditStartupProductType::route('/{record}/edit'),
        ];
    }
}
