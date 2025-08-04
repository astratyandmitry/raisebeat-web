<?php

namespace App\Filament\Resources\StartupTechnologies;

use App\Filament\Resources\StartupTechnologies\Pages\CreateStartupTechnology;
use App\Filament\Resources\StartupTechnologies\Pages\EditStartupTechnology;
use App\Filament\Resources\StartupTechnologies\Pages\ListStartupTechnologies;
use App\Filament\Resources\StartupTechnologies\Pages\ViewStartupTechnology;
use App\Filament\Resources\StartupTechnologies\Schemas\StartupTechnologyForm;
use App\Filament\Resources\StartupTechnologies\Schemas\StartupTechnologyInfolist;
use App\Filament\Resources\StartupTechnologies\Tables\StartupTechnologiesTable;
use App\Models\Dictionaries\StartupTechnology;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StartupTechnologyResource extends Resource
{
    protected static ?string $model = StartupTechnology::class;

    protected static null|string|\UnitEnum $navigationGroup = 'Dictionaries';

    protected static ?string $recordTitleAttribute = 'Startup Technology';

    public static function form(Schema $schema): Schema
    {
        return StartupTechnologyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StartupTechnologyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupTechnologiesTable::configure($table);
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
            'index' => ListStartupTechnologies::route('/'),
            'create' => CreateStartupTechnology::route('/create'),
            'view' => ViewStartupTechnology::route('/{record}'),
            'edit' => EditStartupTechnology::route('/{record}/edit'),
        ];
    }
}
