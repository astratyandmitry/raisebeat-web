<?php

namespace App\Filament\Resources\AcceleratorParticipants\Schemas;

use App\Filament\Support\Actions\ConfirmRecordAction;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Helpers\YearsList;
use App\Models\AcceleratorParticipant;
use App\Models\Enums\Quarter;
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
                TextColumn::make('year')
                    ->width(80)
                    ->label('Period')
                    ->description(fn(AcceleratorParticipant $record) => $record->quarter->getLabel())
                    ->sortable(['year', 'quarter']),
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
                SelectFilter::make('startup_id')
                    ->label('Startup')
                    ->searchable()
                    ->native(false)
                    ->relationship('startup', 'name'),
                SelectFilter::make('year')
                    ->options(YearsList::generate()),
                SelectFilter::make('quarter')
                    ->multiple()
                    ->options(Quarter::getOptions()),
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
