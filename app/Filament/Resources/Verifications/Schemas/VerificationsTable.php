<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Schemas;

use App\Filament\Resources\Verifications\Actions\ApproveBulkAction;
use App\Filament\Resources\Verifications\Actions\ApproveRecordAction;
use App\Filament\Resources\Verifications\Actions\RejectBulkAction;
use App\Filament\Resources\Verifications\Actions\RejectRecordAction;
use App\Filament\Resources\Verifications\Actions\ViewVerificationAction;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Helpers\MorphRoute;
use App\Models\Verification;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

final class VerificationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->with('verifiable'))
            ->defaultSort('id', 'desc')
            ->columns([
                IdColumn::make(),
                TextColumn::make('verifiable.name')
                    ->state(fn(Verification $record) => $record->verifiable->getDisplayLabel())
                    ->description(fn(Verification $record) => Str::title(Str::singular($record->verifiable_type)))
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('comment')
                    ->placeholder('No comment provided.')
                    ->limitedTooltip()
                    ->searchable(),
                TextColumn::make('requested_at')
                    ->width(40)
                    ->label('Requested')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                TextColumn::make('responded_at')
                    ->label('Responded')
                    ->width(40)
                    ->placeholder('Pending')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->recordUrl(fn(Verification $record): string => MorphRoute::make($record, 'verifiable'))
            ->openRecordUrlInNewTab()
            ->recordActions([
                ViewVerificationAction::make(),
                ActionGroup::make([
                    ApproveRecordAction::make(),
                    RejectRecordAction::make(),
                ])->color('gray')->visible(fn(Verification $record) => $record->status->isPending()),
            ])
            ->filters([
                SelectFilter::make('verifiable_type')
                    ->label('Verifiable')
                    ->options([
                        'users' => 'Users',
                        'investors' => 'Investors',
                        'accelerators' => 'Accelerators',
                        'founds' => 'Founds',
                        'medias' => 'Medias',
                    ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    ApproveBulkAction::make(),
                    RejectBulkAction::make(),
                ])->label('Actions'),
            ])
            ->checkIfRecordIsSelectableUsing(
                fn(Verification $record): bool => $record->status->isPending(),
            );
    }
}
