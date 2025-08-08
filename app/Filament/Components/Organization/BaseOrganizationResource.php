<?php

namespace App\Filament\Components\Organization;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

abstract class BaseOrganizationResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'name';

    abstract protected static function getTableColumns(): array;

    abstract protected static function getTableFilters(): array;

    abstract protected static function getInfolistComponents(): array;

    abstract protected static function getFromComponents(): array;

    public static function form(Schema $schema): Schema
    {
        return BaseOrganizationForm::configure($schema, static::getFromComponents());
    }

    public static function infolist(Schema $schema): Schema
    {
        return BaseOrganizationInfolist::configure($schema, static::getInfolistComponents());
    }

    public static function table(Table $table): Table
    {
        return BaseOrganizationTable::configure($table, static::getTableColumns(), static::getTableFilters());
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug', 'headline'];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
