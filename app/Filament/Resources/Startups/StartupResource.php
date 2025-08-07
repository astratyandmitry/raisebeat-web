<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups;

use App\Filament\Resources\Startups\Pages\CreateStartup;
use App\Filament\Resources\Startups\Pages\EditStartup;
use App\Filament\Resources\Startups\Pages\ListStartups;
use App\Filament\Resources\Startups\Pages\ViewStartup;
use App\Filament\Resources\Startups\Schemas\StartupForm;
use App\Filament\Resources\Startups\Schemas\StartupInfolist;
use App\Filament\Resources\Startups\Tables\StartupsTable;
use App\Models\Startup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

final class StartupResource extends Resource
{
    protected static ?string $model = Startup::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return StartupForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StartupInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStartups::route('/'),
            'create' => CreateStartup::route('/create'),
            'view' => ViewStartup::route('/{record}'),
            'edit' => EditStartup::route('/{record}/edit'),
        ];
    }
}
