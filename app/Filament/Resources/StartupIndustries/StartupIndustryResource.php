<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupIndustries;

use UnitEnum;
use App\Filament\Resources\StartupIndustries\Pages\CreateStartupIndustry;
use App\Filament\Resources\StartupIndustries\Pages\EditStartupIndustry;
use App\Filament\Resources\StartupIndustries\Pages\ListStartupIndustries;
use App\Filament\Resources\StartupIndustries\Schemas\StartupIndustryForm;
use App\Filament\Resources\StartupIndustries\Tables\StartupIndustriesTable;
use App\Models\Dictionaries\StartupIndustry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

final class StartupIndustryResource extends Resource
{
    protected static ?string $model = StartupIndustry::class;

    protected static null|string|UnitEnum $navigationGroup = 'Dictionaries';

    public static function form(Schema $schema): Schema
    {
        return StartupIndustryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupIndustriesTable::configure($table);
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
            'index' => ListStartupIndustries::route('/'),
            'create' => CreateStartupIndustry::route('/create'),
            'edit' => EditStartupIndustry::route('/{record}/edit'),
        ];
    }
}
