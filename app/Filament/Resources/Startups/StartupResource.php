<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups;

use App\Filament\Components\BaseOrganizationResource;
use App\Filament\Resources\StartupCategories\Pages\ManageStartupCategories;
use App\Filament\Resources\Startups\Pages\CreateStartup;
use App\Filament\Resources\Startups\Pages\EditStartup;
use App\Filament\Resources\Startups\Pages\ListStartups;
use App\Filament\Resources\Startups\Schemas\StartupForm;
use App\Filament\Resources\Startups\Schemas\StartupInfolist;
use App\Filament\Resources\Startups\Tables\StartupsTable;
use App\Filament\Support\Entries\HtmlEntry;
use App\Models\Enums\BusinessModel;
use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use App\Models\Startup;
use App\Models\User;
use BackedEnum;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

final class StartupResource extends BaseOrganizationResource
{
    protected static ?string $model = Startup::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?int $navigationSort = 1;

    public static function getPages(): array
    {
        return [
            'index' => ListStartups::route('/'),
        ];
    }

    protected static function getTableColumns(): array
    {
        return [
            TextColumn::make('city')
                ->label('Location')
                ->searchable(['country', 'city'])
                ->description(fn(Startup $record) => $record->country->getLabel()),
            TextColumn::make('market_region')
                ->label('Market')
                ->width(80)
                ->color('gray')
                ->badge()
                ->searchable(),
            TextColumn::make('business_model')
                ->label('Model')
                ->width(80)
                ->color('gray')
                ->badge()
                ->searchable(),
            TextColumn::make('stage')
                ->width(80)
                ->badge(),
            TextColumn::make('fundraising_status')
                ->label('Status')
                ->width(80)
                ->badge(),
            TextColumn::make('fundraising_round')
                ->label('Round')
                ->width(80)
                ->badge(),
            IconColumn::make('is_public')
                ->width(40)
                ->label('Public')
                ->boolean(),
        ];
    }

    protected static function getTableFilters(): array
    {
        return [
            SelectFilter::make('country')
                ->options(Country::getOptions()),
            SelectFilter::make('market_region')
                ->label('Market')
                ->options(Region::getOptions()),
            SelectFilter::make('business_model')
                ->label('Model')
                ->options(BusinessModel::getOptions()),
            SelectFilter::make('fundraising_status')
                ->label('Status')
                ->options(FundraisingStatus::getOptions()),
            SelectFilter::make('fundraising_round')
                ->label('Round')
                ->options(FundraisingRound::getOptions()),
            TernaryFilter::make('is_public')->label('Public'),
        ];
    }

    protected static function getInfolistEntries(): array
    {
        return [
            TextEntry::make('city')
                ->label('Location')
                ->formatStateUsing(fn(Startup $record) => "{$record->city}, {$record->country->getLabel()}"),
            TextEntry::make('founded_year')->numeric(),

            Fieldset::make('Market')
                ->columns(1)
                ->schema([
                    TextEntry::make('market_region')
                        ->label('Region')
                        ->color('gray')
                        ->badge(),
                    HtmlEntry::make('market_problem')
                        ->label('Problem'),
                    HtmlEntry::make('market_solution')
                        ->label('Solution'),
                ]),

            Fieldset::make('Data')
                ->columns(3)
                ->inlineLabel(false)
                ->schema([
                    TextEntry::make('business_model')
                        ->label('Model')
                        ->color('gray')
                        ->badge(),
                    TextEntry::make('stage')
                        ->badge(),
                    TextEntry::make('team_size')
                        ->label('Team')
                        ->color('gray')
                        ->badge(),
                    TextEntry::make('fundraising_status')
                        ->label('Status')
                        ->badge(),
                    TextEntry::make('fundraising_round')
                        ->label('Round')
                        ->badge(),
                ]),

            Fieldset::make('URLs')
                ->columns(1)
                ->visible(fn(Startup $record) => ! empty($record->demo_url) || ! empty($record->deck_url))
                ->schema([
                    TextEntry::make('demo_url')
                        ->label('Demo')
                        ->visible(fn(Startup $record) => ! empty($record->demo_url)),
                    TextEntry::make('deck_url')
                        ->label('Deck')
                        ->visible(fn(Startup $record) => ! empty($record->deck_url)),
                ]),

            Fieldset::make('Access')
                ->columns(3)
                ->inlineLabel(false)
                ->schema([
                    IconEntry::make('is_demo_private')
                        ->label('Demo Private')
                        ->boolean(),
                    IconEntry::make('is_deck_private')
                        ->label('Deck Private')
                        ->boolean(),
                    IconEntry::make('is_public')
                        ->label('Public')
                        ->boolean(),
                ]),
        ];
    }
}
