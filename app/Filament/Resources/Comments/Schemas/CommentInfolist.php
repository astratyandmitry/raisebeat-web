<?php

declare(strict_types=1);

namespace App\Filament\Resources\Comments\Schemas;

use App\Filament\Support\Entries\DatesFieldsetEntry;
use App\Filament\Support\Entries\HtmlEntry;
use App\Filament\Support\Entries\UsernameEntry;
use App\Models\Comment;
use App\Models\Post;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class CommentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                UsernameEntry::make(),

                TextEntry::make('commentable')
                    ->label('Commentable')
                    ->color('primary')
                    ->openUrlInNewTab()
                    ->url(fn (Comment $record) => $record->commentable->getPublicUrl())
                    ->formatStateUsing(fn (Comment $record) => match ($record->commentable::class) {
                        Post::class => $record->commentable->title ?? 'Untitled Post',
                    }),

                HtmlEntry::make('content'),

                DatesFieldsetEntry::make(),
            ]);
    }
}
