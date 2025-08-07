<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Resources\Posts\Entries\RepostFieldsetEntry;
use App\Filament\Support\Entries\DatesFieldsetEntry;
use App\Filament\Support\Entries\HtmlEntry;
use App\Filament\Support\Entries\UsernameEntry;
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
                    ->openUrlInNewTab()
                    ->state(fn(Post $record) => $record->postable->getDisplayLabel())
                    ->url(function (Post $record): string {
                        return route("filament.admin.resources.{$record->postable_type}.view", $record->postable_id);
                    }),

                TextEntry::make('type')->badge(),
                TextEntry::make('title')->visible(fn(Post $record) => ! empty($record->title)),
                HtmlEntry::make('description')->visible(fn(Post $record) => ! empty($record->title)),

                TextEntry::make('external_url')
                    ->label('External URL')
                    ->openUrlInNewTab()
                    ->url(fn(Post $record) => $record->external_url)
                    ->visible(fn(Post $record) => ! empty($record->external_url)),

                RepostFieldsetEntry::make(),

                DatesFieldsetEntry::make(),
            ]);
    }
}
