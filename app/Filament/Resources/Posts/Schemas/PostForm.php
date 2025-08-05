<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Enums\PostType;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                Select::make('parent_id')
                    ->relationship('parent', 'title'),
                Select::make('user_id')
                    ->relationship('user', 'id')
                    ->required(),
                TextInput::make('postable_type')
                    ->required(),
                TextInput::make('postable_id')
                    ->required()
                    ->numeric(),
                Select::make('type')
                    ->options(PostType::class)
                    ->required(),
                TextInput::make('title'),
                TextInput::make('description'),
                Textarea::make('content')
                    ->columnSpanFull(),
                TextInput::make('repost_comment'),
                TextInput::make('external_url'),
                TextInput::make('count_viewed')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('count_likes')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('count_reposts')
                    ->required()
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('published_at'),
            ]);
    }
}
