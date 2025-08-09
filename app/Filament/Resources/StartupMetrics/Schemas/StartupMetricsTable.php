<?php

namespace App\Filament\Resources\StartupMetrics\Schemas;

use App\Filament\Support\Actions\ConfirmRecordAction;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Helpers\YearsList;
use App\Models\Enums\MetricType;
use App\Models\Enums\Quarter;
use App\Models\Investment;
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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class StartupMetricsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort(fn($query) => $query->orderByDesc('year')->orderByDesc('quarter'))
            ->modifyQueryUsing(fn($query) => $query->with('startup'))
            ->columns([
                IdColumn::make(),
                TextColumn::make('startup.name'),
                TextColumn::make('year')
                    ->width(80)
                    ->label('Period')
                    ->description(fn(StartupMetric $record) => $record->quarter->getLabel())
                    ->sortable(['year', 'quarter']),
                TextColumn::make('value')
                    ->width(120)
                    ->label('Metric')
                    ->description(fn(StartupMetric $record) => $record->type->value)
                    ->numeric(),
                IconColumn::make('is_confirmed')
                    ->label('Confirmed')
                    ->width(40)
                    ->alignCenter()
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->width(80)
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(MetricType::getOptions()),
                SelectFilter::make('year')
                    ->options(YearsList::generate()),
                SelectFilter::make('quarter')
                    ->multiple()
                    ->options(Quarter::getOptions()),
                TernaryFilter::make('is_confirmed')->label('Confirmed'),
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
