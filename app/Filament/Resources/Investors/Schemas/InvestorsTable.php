<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Schemas;

use App\Filament\Support\Columns\IdColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class InvestorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IdColumn::make(),
                ImageColumn::make('user.avatar_url')
                    ->width(40)
                    ->circular()
                    ->label('Avatar'),
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('check_size_min')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('check_size_max')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('focus_headline')
                    ->searchable(),
                TextColumn::make('focus_region')
                    ->searchable(),
                TextColumn::make('count_viewed')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
