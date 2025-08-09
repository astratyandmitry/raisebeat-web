<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Support\Actions\ViewRecordPublicUrlAction;
use App\Filament\Support\Columns\DateColumn;
use App\Filament\Support\Columns\IdColumn;
use App\Models\Enums\Country;
use App\Models\User;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->modifyQueryUsing(fn($query) => $query->with('investor_profile'))
            ->columns([
                IdColumn::make(),
                ImageColumn::make('avatar_url')
                    ->width(40)
                    ->circular()
                    ->label('Avatar'),
                TextColumn::make('first_name')
                    ->label('Info')
                    ->formatStateUsing(fn(User $record): string => $record->getDisplayLabel())
                    ->description(fn(User $record): string => "@{$record->username}")
                    ->searchable(['first_name', 'last_name', 'username']),
                TextColumn::make('city')
                    ->label('Location')
                    ->searchable(['country', 'city'])
                    ->description(fn(User $record) => $record->country->getLabel()),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->width(80)
                    ->label('Verified')
                    ->dateTime('Y-m-d H:i')
                    ->placeholder('Not verified')
                    ->toggleable(),
                TextColumn::make('uuid')
                    ->width(40)
                    ->label('Type')
                    ->badge()
                    ->color(fn(User $record): string => $record->investor_profile ? 'danger' : 'info')
                    ->formatStateUsing(fn(User $record): string => $record->investor_profile ? 'Investor' : 'User'),
                DateColumn::make(),
            ])
            ->filters([
                SelectFilter::make('country')
                    ->options(Country::getOptions()),

                Filter::make('email_verified_at')
                    ->label('Verified only')
                    ->checkbox()
                    ->modifyQueryUsing(fn($query) => $query->whereNotNull('email_verified_at')),

                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()->hiddenLabel(),
                ViewRecordPublicUrlAction::make()->hiddenLabel(),

                ActionGroup::make([
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
