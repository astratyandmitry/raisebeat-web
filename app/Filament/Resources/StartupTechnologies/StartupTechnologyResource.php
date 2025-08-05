<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupTechnologies;

use UnitEnum;
use App\Filament\Resources\StartupTechnologies\Pages\CreateStartupTechnology;
use App\Filament\Resources\StartupTechnologies\Pages\EditStartupTechnology;
use App\Filament\Resources\StartupTechnologies\Pages\ListStartupTechnologies;
use App\Filament\Resources\StartupTechnologies\Schemas\StartupTechnologyForm;
use App\Filament\Resources\StartupTechnologies\Tables\StartupTechnologiesTable;
use App\Models\Dictionaries\StartupTechnology;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

final class StartupTechnologyResource extends Resource
{
    protected static ?string $model = StartupTechnology::class;

    protected static null|string|UnitEnum $navigationGroup = 'Dictionaries';

    public static function form(Schema $schema): Schema
    {
        return StartupTechnologyForm::configure($schema);
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
            'edit' => EditStartupTechnology::route('/{record}/edit'),
        ];
    }
}
