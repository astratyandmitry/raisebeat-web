<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies;

use App\Filament\Resources\StartupVacancies\Pages\ManageStartupVacancies;
use App\Filament\Resources\StartupVacancies\Schemas\StartupVacanciesTable;
use App\Filament\Resources\StartupVacancies\Schemas\StartupVacancyInfolist;
use App\Models\StartupVacancy;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use UnitEnum;

final class StartupVacancyResource extends Resource
{
    protected static ?string $model = StartupVacancy::class;

    protected static null|string|UnitEnum $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Vacancies';

    protected static ?string $recordTitleAttribute = 'title';

    public static function infolist(Schema $schema): Schema
    {
        return StartupVacancyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupVacanciesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageStartupVacancies::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'description'];
    }

    /**
     * @param  \App\Models\StartupVacancy  $record
     * @return array|string[]
     */
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Startup' => $record->startup->getDisplayLabel(),
            'Description' => Str::limit($record->description, 60),
        ];
    }
}
