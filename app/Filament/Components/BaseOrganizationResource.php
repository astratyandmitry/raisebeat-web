<?php

namespace App\Filament\Components;

use App\Filament\Resources\Startups\Pages\CreateStartup;
use App\Filament\Resources\Startups\Pages\EditStartup;
use App\Filament\Resources\Startups\Pages\ListStartups;
use App\Filament\Resources\Startups\Pages\ViewStartup;
use App\Filament\Resources\Startups\Schemas\StartupForm;
use App\Filament\Resources\Startups\Schemas\StartupInfolist;
use App\Filament\Resources\Startups\Tables\StartupsTable;
use App\Filament\Support\Actions\ViewPublicUrlAction;
use App\Filament\Support\Columns\IdColumn;
use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\HtmlEntry;
use App\Filament\Support\Entries\UserFieldset;
use App\Filament\Support\Entries\UsernameEntry;
use App\Models\Abstracts\Organization;
use App\Models\Enums\BusinessModel;
use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use App\Models\Enums\StartupStage;
use App\Models\Enums\TeamSize;
use App\Models\Investor;
use App\Models\Startup;
use App\Models\User;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Tiptap\Nodes\Text;

abstract class BaseOrganizationResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
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
                TextInput::make('market_problem')
                    ->required(),
                TextInput::make('market_solution')
                    ->required(),
                Select::make('market_region')
                    ->options(Region::class)
                    ->required(),
                Select::make('country')
                    ->options(Country::class)
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('founded_year')
                    ->required()
                    ->numeric(),
                Select::make('business_model')
                    ->options(BusinessModel::class)
                    ->required(),
                Select::make('stage')
                    ->options(StartupStage::class)
                    ->required(),
                Select::make('fundraising_status')
                    ->options(FundraisingStatus::class)
                    ->required(),
                Select::make('fundraising_round')
                    ->options(FundraisingRound::class),
                Select::make('team_size')
                    ->options(TeamSize::class)
                    ->required(),
                TextInput::make('demo_url'),
                TextInput::make('deck_url'),
                Toggle::make('is_demo_private')
                    ->required(),
                Toggle::make('is_deck_private')
                    ->required(),
                Toggle::make('is_public')
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel()
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                ImageEntry::make('logo_url')
                    ->circular()
                    ->label('Logo'),
                TextEntry::make('name'),
                TextEntry::make('headline')->placeholder('None'),
                HtmlEntry::make('description'),

                ...static::getInfolistEntries(),

                UserFieldset::make(),

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IdColumn::make(),
                ImageColumn::make('logo_url')
                    ->width(40)
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    ->description(fn(Organization $record): string => Str::limit($record->headline, 80))
                    ->searchable(['name', 'headline']),
                ...static::getTableColumns(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->width(80)
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                ...static::getTableFilters(),

                TrashedFilter::make('deleted_at'),
            ])
            ->recordActions([
                ViewAction::make()->hiddenLabel(),
                ViewPublicUrlAction::make()->hiddenLabel(),

                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                    ForceDeleteAction::make(),
                    RestoreAction::make(),
                ])->color('gray'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    abstract protected static function getTableColumns(): array;

    abstract protected static function getTableFilters(): array;

    abstract protected static function getInfolistEntries(): array;

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug', 'headline'];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
