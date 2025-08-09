<?php

namespace App\Filament\Resources\Investments\Schemas;

use App\Filament\Support\Actions\ConfirmRecordAction;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Helpers\YearsList;
use App\Models\Enums\Quarter;
use App\Models\Investment;
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
use Illuminate\Support\Str;

final class InvestmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort(fn($query) => $query->orderByDesc('year')->orderByDesc('quarter'))
            ->modifyQueryUsing(fn($query) => $query->with('startup', 'investable'))
            ->columns([
                IdColumn::make(),
                TextColumn::make('startup.name'),
                TextColumn::make('investable.name')
                    ->label('Investor')
                    ->state(fn(Investment $record) => $record->investable->getDisplayLabel())
                    ->description(fn(Investment $record) => Str::title(Str::singular($record->investable_type)))
                    ->searchable(),
                TextColumn::make('year')
                    ->width(80)
                    ->label('Period')
                    ->description(fn(Investment $record) => $record->quarter->getLabel())
                    ->sortable(['year', 'quarter']),
                TextColumn::make('amount_usd')
                    ->width(120)
                    ->sortable()
                    ->label('Amount')
                    ->money('usd'),
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
