<?php

declare(strict_types=1);

namespace App\Filament\Components\Organization;

use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\HtmlEntry;
use App\Filament\Support\Entries\UserFieldset;
use App\Filament\Support\Forms\UuidInput;
use App\Models\Contracts\RelaterToUser;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

abstract class BaseOrganizationInfolist
{
    public static function configure(Schema $schema, array $components = []): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel()
            ->components([
                UuidInput::make(),
                ImageEntry::make('logo_url')
                    ->circular()
                    ->label('Logo'),
                TextEntry::make('name'),
                TextEntry::make('headline')->placeholder('None'),
                HtmlEntry::make('description'),

                ...$components,

                UserFieldset::make()->visible(fn (RelaterToUser $record): bool => ! empty($record->user)),
                Fieldset::make('Contacts')
                    ->columns(1)
                    ->schema([
                        TextEntry::make('contact_website')
                            ->label('Website')
                            ->placeholder('None'),
                        TextEntry::make('contact_email')
                            ->label('Email')
                            ->placeholder('None'),
                        TextEntry::make('contact_phone')
                            ->label('Phone')
                            ->placeholder('None'),
                    ]),

                DatesFieldset::make(),
            ]);
    }
}
