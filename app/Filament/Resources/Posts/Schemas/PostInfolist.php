<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('parent.title')
                    ->numeric(),
                TextEntry::make('user.id')
                    ->numeric(),
                TextEntry::make('postable_type'),
                TextEntry::make('postable_id')
                    ->numeric(),
                TextEntry::make('type'),
                TextEntry::make('title'),
                TextEntry::make('description'),
                TextEntry::make('repost_comment'),
                TextEntry::make('external_url'),
                TextEntry::make('count_viewed')
                    ->numeric(),
                TextEntry::make('count_likes')
                    ->numeric(),
                TextEntry::make('count_reposts')
                    ->numeric(),
                TextEntry::make('published_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
