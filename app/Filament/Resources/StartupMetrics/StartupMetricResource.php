<?php

namespace App\Filament\Resources\StartupMetrics;

use App\Filament\Resources\StartupMetrics\Pages\ManageStartupMetrics;
use App\Filament\Resources\StartupMetrics\Schemas\StartupMetricForm;
use App\Filament\Resources\StartupMetrics\Schemas\StartupMetricInfolist;
use App\Filament\Resources\StartupMetrics\Schemas\StartupMetricsTable;
use App\Models\StartupMetric;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

final class StartupMetricResource extends Resource
{
    protected static ?string $model = StartupMetric::class;

    protected static null|string|\UnitEnum $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Metrics';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return StartupMetricForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StartupMetricInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupMetricsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageStartupMetrics::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
