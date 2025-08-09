<?php

declare(strict_types=1);

namespace App\Filament\Components\Organization;

use App\Filament\Support\Forms\UuidInput;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

abstract class BaseOrganizationForm
{
    public static function configure(Schema $schema, array $components = []): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                UuidInput::make(),

                Select::make('user_id')
                    ->label('User')
                    ->nullable()
                    ->default(null)
                    ->options(User::query()->pluck('username', 'id'))
                    ->dehydrateStateUsing(fn ($state) => ($state === '' ? null : $state))
                    ->native(false)
                    ->searchable(),

                Grid::make(2)
                    ->schema([
                        TextInput::make('name')
                            ->maxLength(80)
                            ->unique()
                            ->required(),

                        // todo: slug generation
                        TextInput::make('slug')
                            ->maxlength(80)
                            ->alphaDash()
                            ->unique()
                            ->disabledOn('edit')
                            ->required(),
                    ]),

                TextInput::make('headline')->maxLength(120),
                Textarea::make('description')->autosize(),

                FileUpload::make('logo_url')
                    ->label('Logo')
                    ->required()
                    ->image(),

                ...$components,

                Fieldset::make('Contacts')
                    ->schema([
                        TextInput::make('contact_website')
                            ->label('Website')
                            ->placeholder('https://example.com')
                            ->maxLength(250)
                            ->activeUrl()
                            ->columnSpanFull(),
                        TextInput::make('contact_email')
                            ->maxLength(80)
                            ->label('Email')
                            ->placeholder('user@example.ocm')
                            ->email(),
                        TextInput::make('contact_phone')
                            ->label('Phone')
                            ->placeholder('+7(777)1234567')
                            ->mask('+7(799)9999999'),
                    ]),
            ]);
    }
}
