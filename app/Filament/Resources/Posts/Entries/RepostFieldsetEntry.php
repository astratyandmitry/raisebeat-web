<?php

namespace App\Filament\Resources\Posts\Entries;

use App\Models\Post;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class RepostFieldsetEntry
{
    public static function make(): Fieldset
    {
        return Fieldset::make('Repost')
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
            ])->visible(fn(Post $record) => $record->parent !== null);
    }
}
