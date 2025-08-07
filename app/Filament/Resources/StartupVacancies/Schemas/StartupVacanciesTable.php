<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Schemas;

use App\Filament\Support\Actions\ViewPublicUrlAction;
use App\Models\Enums\VacancyType;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class StartupVacanciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->width(50)
                    ->label('ID'),
                TextColumn::make('title')
                    ->limit(50)
                    ->searchable(['title', 'content']),
                TextColumn::make('startup.name')
                    ->label('Startup')
                    ->searchable(),
                TextColumn::make('type')
                    ->width(20)
                    ->color('gray')
                    ->badge()
                    ->searchable(),
                IconColumn::make('is_applicable')
                    ->width(20)
                    ->label('Applicable')
                    ->alignCenter()
                    ->boolean(),
                TextColumn::make('created_at')
                    ->width(40)
                    ->label('Created')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('Y-m-d H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->label('Deleted')
                    ->dateTime('Y-m-d H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')->options(VacancyType::options()),
                TernaryFilter::make('is_applicable')->label('Applicable'),
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()->hiddenLabel(),
                ViewPublicUrlAction::make()->hiddenLabel(),

                ActionGroup::make([
                    DeleteAction::make(),
                    ForceDeleteAction::make(),
                    RestoreAction::make(),
                ])->color('gray'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
