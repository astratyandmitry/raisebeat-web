<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FoundsTable
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
                TextColumn::make('founded_year')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('check_size_min')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('check_size_max')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('focus_region')
                    ->searchable(),
                TextColumn::make('investment_model')
                    ->searchable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('count_viewed')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_lead_investor')
                    ->boolean(),
                IconColumn::make('is_follow_investor')
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
