<?php

namespace App\Filament\Resources\Admins\Schemas;

use App\Filament\Resources\Admins\Actions\EditAdminAction;
use App\Models\Admin;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class AdminsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                TextColumn::make('id')
                    ->width(50)
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),
                IconColumn::make('deleted_at')
                    ->label('State')
                    ->trueColor('danger')
                    ->alignCenter()
                    ->icon('heroicon-o-trash')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])->recordActions([
                ViewAction::make()->hiddenLabel(),
                ActionGroup::make([
                    EditAdminAction::make(),
                    DeleteAction::make(),
                    ForceDeleteAction::make()->hidden(),
                    RestoreAction::make(),
                ])->color('gray')->visible(fn(Admin $record) => ! $record->root || auth()->user()->root),
            ])
            ->filters([
                TrashedFilter::make(),
            ]);
    }
}
