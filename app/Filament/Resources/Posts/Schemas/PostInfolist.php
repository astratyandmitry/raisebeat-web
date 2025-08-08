<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Resources\Posts\Entries\RepostFieldsetEntry;
use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\HtmlEntry;
use App\Filament\Support\Entries\UsernameEntry;
use App\Filament\Support\Helpers\MorphRoute;
use App\Models\Post;
use Filament\Infolists\Components\TextEntry;
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
                UsernameEntry::make(),

                TextEntry::make('postable.name')
                    ->label('Postable')
                    ->color('primary')
                    ->weight('medium')
                    ->iconColor('primary')
                    ->icon('heroicon-s-link')
                    ->openUrlInNewTab()
                    ->state(fn(Post $record) => $record->postable->getDisplayLabel())
                    ->url(fn(Post $record): string => MorphRoute::make($record, 'postable')),

                TextEntry::make('type')->badge(),
                TextEntry::make('title')->visible(fn(Post $record): bool => ! empty($record->title)),
                HtmlEntry::make('description')->visible(fn(Post $record): bool => ! empty($record->title)),

                TextEntry::make('external_url')
                    ->label('External URL')
                    ->openUrlInNewTab()
                    ->url(fn(Post $record) => $record->external_url)
                    ->visible(fn(Post $record): bool => ! empty($record->external_url)),

                RepostFieldsetEntry::make(),

                DatesFieldset::make(),
            ]);
    }
}
