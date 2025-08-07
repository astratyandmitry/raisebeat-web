<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications;

use App\Filament\Resources\Verifications\Actions\ApproveBulkAction;
use App\Filament\Resources\Verifications\Actions\ApproveRecordAction;
use App\Filament\Resources\Verifications\Actions\RejectBulkAction;
use App\Filament\Resources\Verifications\Actions\RejectRecordAction;
use App\Filament\Resources\Verifications\Actions\ViewVerifiableAction;
use App\Filament\Resources\Verifications\Pages\ManageVerifications;
use App\Models\Verification;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use UnitEnum;

final class VerificationResource extends Resource
{
    protected static ?string $model = Verification::class;

    protected static null|string|UnitEnum $navigationGroup = 'System';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('requested_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('verifiable.')
                    ->state(fn(Verification $record) => $record->verifiable->getDisplayLabel())
                    ->description(fn(Verification $record) => Str::title($record->verifiable_type)),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('comment')
                    ->placeholder('No comment provided.')
                    ->limit(40)
                    ->tooltip(function (TextColumn $column): ?string {
                        if (strlen((string) $column->getState()) <= $column->getCharacterLimit()) {
                            return null;
                        }

                        return $column->getState();
                    })
                    ->searchable(),
                TextColumn::make('requested_at')
                    ->label('Requested')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                TextColumn::make('responded_at')
                    ->label('Responded')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->recordActions([
                ActionGroup::make([
                    ApproveRecordAction::make(),
                    RejectRecordAction::make(),
                ])->visible(fn(Verification $record) => $record->status->isPending()),
                ViewVerifiableAction::make(),
            ])
            ->filters([
                SelectFilter::make('verifiable_type')
                    ->options([
                        'users' => 'Users',
                        'investors' => 'Investors',
                        'accelerators' => 'Accelerators',
                        'founds' => 'Founds',
                        'medias' => 'Medias',
                    ])
                    ->label('Verifiable'),
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

    public static function getPages(): array
    {
        return [
            'index' => ManageVerifications::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('verifiable');
    }
}
