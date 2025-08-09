<?php

namespace App\Filament\Resources\AcceleratorParticipants\Schemas;

use App\Filament\Support\Actions\ConfirmRecordAction;
use App\Filament\Support\Columns\ConfirmedColumn;
use App\Filament\Support\Columns\DateColumn;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Columns\YearQuarterColumn;
use App\Filament\Support\Filters\ConfirmedFilter;
use App\Filament\Support\Filters\StartupFilter;
use App\Filament\Support\Filters\YearQuarterFilters;
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
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class AcceleratorParticipantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort(fn($query) => $query->orderByDesc('year')->orderByDesc('quarter'))
            ->modifyQueryUsing(fn($query) => $query->with('startup', 'accelerator'))
            ->columns([
                IdColumn::make(),
                TextColumn::make('accelerator.name'),
                TextColumn::make('startup.name'),
                YearQuarterColumn::make(),
                ConfirmedColumn::make(),
                DateColumn::make(),
            ])
            ->filters([
                StartupFilter::make(),
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
