<?php

declare(strict_types=1);

namespace App\Filament\Resources\Comments\Schemas;

use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Columns\UsernameColumn;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class CommentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->with('commentable', 'user'))
            ->defaultSort('id', 'desc')
            ->columns([
                IdColumn::make(),
                TextColumn::make('content')
                    ->label('Comment')
                    ->limitedTooltip(80),
                UsernameColumn::make(),
                TextColumn::make('created_at')
                    ->width(80)
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()->hiddenLabel(),

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
