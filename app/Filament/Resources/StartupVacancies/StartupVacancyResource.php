<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies;

use UnitEnum;
use App\Filament\Resources\StartupVacancies\Pages\CreateStartupVacancy;
use App\Filament\Resources\StartupVacancies\Pages\EditStartupVacancy;
use App\Filament\Resources\StartupVacancies\Pages\ListStartupVacancies;
use App\Filament\Resources\StartupVacancies\Pages\ViewStartupVacancy;
use App\Filament\Resources\StartupVacancies\Schemas\StartupVacancyForm;
use App\Filament\Resources\StartupVacancies\Schemas\StartupVacancyInfolist;
use App\Filament\Resources\StartupVacancies\Tables\StartupVacanciesTable;
use App\Models\StartupVacancy;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

final class StartupVacancyResource extends Resource
{
    protected static ?string $model = StartupVacancy::class;

    protected static null|string|UnitEnum $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Vacancies';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return StartupVacancyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StartupVacancyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupVacanciesTable::configure($table);
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
            'index' => ListStartupVacancies::route('/'),
            'create' => CreateStartupVacancy::route('/create'),
            'view' => ViewStartupVacancy::route('/{record}'),
            'edit' => EditStartupVacancy::route('/{record}/edit'),
        ];
    }
}
