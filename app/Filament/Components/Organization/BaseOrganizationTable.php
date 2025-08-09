<?php

declare(strict_types=1);

namespace App\Filament\Components\Organization;

use App\Filament\Support\Actions\GoToVerififcationAction;
use App\Filament\Support\Actions\ViewRecordPublicUrlAction;
use App\Filament\Support\Columns\DateColumn;
use App\Filament\Support\Columns\IdColumn;
use App\Models\Abstracts\Organization;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

abstract class BaseOrganizationTable
{
    public static function configure(Table $table, array $columns = [], array $filters = []): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->modifyQueryUsing(fn ($query) => $query->with('latest_verification'))
            ->columns([
                IdColumn::make(),
                ImageColumn::make('logo_url')
                    ->width(40)
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    ->description(fn (Organization $record): string => Str::limit($record->headline, 80))
                    ->searchable(['name', 'headline']),
                ...$columns,
                IconColumn::make('is_public')
                    ->width(40)
                    ->alignCenter()
                    ->label('Public')
                    ->boolean(),
                TextColumn::make('latest_verification.status')
                    ->width(80)
                    ->label('Verification')
                    ->badge(),
                DateColumn::make(),
            ])
            ->filters([
                ...$filters,
                TernaryFilter::make('is_public')->label('Public'),
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()->hiddenLabel(),
                ViewRecordPublicUrlAction::make()->hiddenLabel(),

                ActionGroup::make([
                    GoToVerififcationAction::make(),
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
