<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Schemas;

use App\Filament\Support\Actions\ViewRecordPublicUrlAction;
use App\Filament\Support\Columns\DateColumn;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Filters\StartupFilter;
use App\Models\Enums\VacancyType;
use App\Models\StartupVacancy;
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
use Illuminate\Support\Str;

final class StartupVacanciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                IdColumn::make(),
                TextColumn::make('title')
                    ->limit(50)
                    ->description(fn (StartupVacancy $record) => Str::limit($record->description))
                    ->searchable(['title', 'description']),
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
                DateColumn::make(),
            ])
            ->filters([
                StartupFilter::make(),
                SelectFilter::make('type')->options(VacancyType::getOptions()),
                TernaryFilter::make('is_applicable')->label('Applicable'),
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
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
