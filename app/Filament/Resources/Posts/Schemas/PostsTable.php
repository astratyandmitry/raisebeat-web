<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Support\Actions\ViewPublicUrlAction;
use App\Models\Enums\PostType;
use App\Models\Post;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

final class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->width(50)
                    ->label('ID'),
                TextColumn::make('title')
                    ->label('Post')
                    ->formatStateUsing(fn(Post $record) => $record->parent ? $record->parent->title : $record->title)
                    ->description(fn(Post $record) => Str::limit($record->repost_comment ?: $record->description, 80))
                    ->searchable(['title', 'description']),
                TextColumn::make('type')
                    ->formatStateUsing(fn(Post $record) => $record->parent ? 'REPOST' : $record->type)
                    ->color(fn(Post $record) => $record->parent ? 'white' : $record->type->getColor())
                    ->badge()
                    ->searchable(),
                TextColumn::make('postable.name')
                    ->state(fn(Post $record) => $record->postable->getDisplayLabel())
                    ->description(fn(Post $record) => Str::title($record->postable_type))
                    ->searchable(),
                IconColumn::make('external_url')
                    ->label('URL')
                    ->trueColor('primary')
                    ->tooltip(fn(Post $record) => $record->external_url)
                    ->url(fn(Post $record) => $record->external_url)
                    ->openUrlInNewTab()
                    ->alignCenter()
                    ->icon('heroicon-o-link')
                    ->boolean(),
                TextColumn::make('published_at')
                    ->label('Published')
                    ->width(80)
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(PostType::options()),

                Filter::make('external')
                    ->checkbox()
                    ->modifyQueryUsing(fn($query) => $query->whereNotNull('external_url')),
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
                ]),
            ]);
    }
}
