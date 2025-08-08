<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Schemas;

use App\Filament\Support\Forms\LocationFieldsGrid;
use App\Models\Enums\Country;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

final class FoundForm
{
    public static function fields(): array
    {
        return [
            Fieldset::make('Found')
                ->columns(1)
                ->schema([
                    LocationFieldsGrid::make(),

                    Grid::make(3)
                        ->schema([
                            Select::make('focus_region')
                                ->required()
                                ->options(Region::getOptions()),
                            Select::make('investment_model')
                                ->required()
                                ->options(InvestmentModel::getOptions()),

                            TextInput::make('founded_year')
                                ->required()
                                ->numeric()
                                ->minValue(2000)
                                ->maxValue(date('Y')),
                        ]),

                    Fieldset::make('Check')
                        ->columns(2)
                        ->schema([
                            TextInput::make('check_size_min')
                                ->label('Min size')
                                ->numeric(),
                            TextInput::make('check_size_max')
                                ->label('Max size')
                                ->numeric(),
                        ]),

                    Fieldset::make('Config')->columns(3)
                        ->schema([
                            Toggle::make('is_lead_investor')
                                ->label('Lead Investor'),
                            Toggle::make('is_follow_investor')
                                ->label('Follow Investor'),
                            Toggle::make('is_public')
                                ->label('Public'),
                        ]),
                ]),
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('headline'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('logo_url'),
                TextInput::make('contact_website'),
                TextInput::make('contact_email')
                    ->email(),
                TextInput::make('contact_phone')
                    ->tel(),
                TextInput::make('founded_year')
                    ->required()
                    ->numeric(),
                TextInput::make('check_size_min')
                    ->numeric(),
                TextInput::make('check_size_max')
                    ->numeric(),
                Select::make('focus_region')
                    ->options(Region::class)
                    ->required(),
                Select::make('investment_model')
                    ->options(InvestmentModel::class)
                    ->required(),
                Select::make('country')
                    ->options(Country::class)
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('count_viewed')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_lead_investor')
                    ->required(),
                Toggle::make('is_follow_investor')
                    ->required(),
                Toggle::make('is_public')
                    ->required(),
            ]);
    }
}
