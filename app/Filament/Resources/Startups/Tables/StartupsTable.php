<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class StartupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uuid')
                    ->label('UUID')
                    ->searchable(),
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('headline')
                    ->searchable(),
                TextColumn::make('logo_url')
                    ->searchable(),
                TextColumn::make('contact_website')
                    ->searchable(),
                TextColumn::make('contact_email')
                    ->searchable(),
                TextColumn::make('contact_phone')
                    ->searchable(),
                TextColumn::make('market_problem')
                    ->searchable(),
                TextColumn::make('market_solution')
                    ->searchable(),
                TextColumn::make('market_region')
                    ->searchable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('founded_year')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('business_model')
                    ->searchable(),
                TextColumn::make('stage')
                    ->searchable(),
                TextColumn::make('fundraising_status')
                    ->searchable(),
                TextColumn::make('fundraising_round')
                    ->searchable(),
                TextColumn::make('team_size')
                    ->searchable(),
                TextColumn::make('demo_url')
                    ->searchable(),
                TextColumn::make('deck_url')
                    ->searchable(),
                IconColumn::make('is_demo_private')
                    ->boolean(),
                IconColumn::make('is_deck_private')
                    ->boolean(),
                IconColumn::make('is_public')
                    ->boolean(),
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
