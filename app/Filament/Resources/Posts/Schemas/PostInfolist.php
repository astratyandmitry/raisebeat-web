<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Resources\Users\UserResource;
use App\Models\Post;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('user.username')
                    ->label('User')
                    ->color('primary')
                    ->openUrlInNewTab()
                    ->url(fn(Post $record) => UserResource::getUrl('view', [$record]))
                    ->state(fn(Post $record) => "@{$record->user->username}"),
                TextEntry::make('postable.name')
                    ->label('Postable')
                    ->color('primary')
                    ->openUrlInNewTab()
                    ->url(function (Post $record): string {
                        return route("filament.admin.resources.{$record->postable_type}.view", $record->postable_id);
                    })
                    ->state(fn(Post $record) => $record->postable->getDisplayLabel()),
                TextEntry::make('type')->badge(),
                TextEntry::make('title')
                    ->visible(fn(Post $record) => ! empty($record->title)),
                TextEntry::make('description')
                    ->formatStateUsing(fn(Post $record) => nl2br($record->description))
                    ->html()
                    ->visible(fn(Post $record) => ! empty($record->title)),
                TextEntry::make('external_url')
                    ->label('External URL')
                    ->openUrlInNewTab()
                    ->url(fn(Post $record) => $record->external_url)
                    ->visible(fn(Post $record) => ! empty($record->external_url)),

                Fieldset::make('Repost')
                    ->inlineLabel()
                    ->columns(1)
                    ->schema([
                        TextEntry::make('parent.title')
                            ->visible(fn(Post $record) => ! empty($record->parent->title))
                            ->label('Original Title'),
                        TextEntry::make('parent.description')
                            ->visible(fn(Post $record) => ! empty($record->parent->description))
                            ->formatStateUsing(fn(Post $record) => nl2br($record->parent->description))
                            ->label('Original Description'),

                        TextEntry::make('repost_comment')->name('Comment'),
                    ])->visible(fn(Post $record) => $record->parent !== null),

                Fieldset::make('Dates')
                    ->inlineLabel(false)
                    ->schema([
                        TextEntry::make('published_at')
                            ->dateTime('Y-m-d H:i'),
                        TextEntry::make('created_at')
                            ->dateTime('Y-m-d H:i'),
                        TextEntry::make('updated_at')
                            ->dateTime('Y-m-d H:i'),
                        TextEntry::make('deleted_at')
                            ->dateTime('Y-m-d H:i')
                            ->placeholder('None'),
                    ]),
            ]);
    }
}
