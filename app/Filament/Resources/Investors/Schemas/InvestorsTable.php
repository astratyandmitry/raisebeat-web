<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Schemas;

use App\Filament\Support\Actions\ViewPublicUrlAction;
use App\Filament\Support\Columns\IdColumn;
use App\Models\Enums\Country;
use App\Models\Enums\Region;
use App\Models\Investor;
use App\Models\User;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class InvestorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->modifyQueryUsing(fn($query) => $query->with('user'))
            ->columns([
                IdColumn::make(),
                ImageColumn::make('user.avatar_url')
                    ->width(40)
                    ->circular()
                    ->label('Avatar'),
                TextColumn::make('user.first_name')
                    ->label('User')
                    ->formatStateUsing(fn(Investor $record) => $record->user->getDisplayLabel())
                    ->description(fn(Investor $record) => "@{$record->user->username}"),
                TextColumn::make('focus_headline')
                    ->label('Headline')
                    ->limitedTooltip(100)
                    ->searchable(),
                TextColumn::make('focus_region')
                    ->width(80)
                    ->label('Region')
                    ->color('gray')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('focus_region')
                    ->options(Region::options()),

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
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
