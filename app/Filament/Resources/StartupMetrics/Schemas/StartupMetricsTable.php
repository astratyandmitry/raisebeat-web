<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupMetrics\Schemas;

use App\Filament\Support\Actions\ConfirmRecordAction;
use App\Filament\Support\Columns\ConfirmedColumn;
use App\Filament\Support\Columns\DateColumn;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Columns\YearQuarterColumn;
use App\Filament\Support\Filters\ConfirmedFilter;
use App\Filament\Support\Filters\StartupFilter;
use App\Filament\Support\Filters\YearQuarterFilters;
use App\Models\Enums\MetricType;
use App\Models\StartupMetric;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class StartupMetricsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort(fn ($query) => $query->orderByDesc('year')->orderByDesc('quarter'))
            ->modifyQueryUsing(fn ($query) => $query->with('startup'))
            ->columns([
                IdColumn::make(),
                TextColumn::make('startup.name'),
                YearQuarterColumn::make(),
                TextColumn::make('value')
                    ->width(120)
                    ->label('Metric')
                    ->description(fn (StartupMetric $record) => $record->type->value)
                    ->numeric(),
                ConfirmedColumn::make(),
                DateColumn::make(),
            ])
            ->filters([
                StartupFilter::make(),
                SelectFilter::make('type')
                    ->options(MetricType::getOptions()),
                ...YearQuarterFilters::make(),
                ConfirmedFilter::make(),
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()->hiddenLabel(),

                ActionGroup::make([
                    ConfirmRecordAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                    ForceDeleteAction::make(),
                    RestoreAction::make(),
                ])->color('gray'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
