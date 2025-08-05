<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds;

use App\Filament\Resources\Founds\Pages\CreateFound;
use App\Filament\Resources\Founds\Pages\EditFound;
use App\Filament\Resources\Founds\Pages\ListFounds;
use App\Filament\Resources\Founds\Pages\ViewFound;
use App\Filament\Resources\Founds\Schemas\FoundForm;
use App\Filament\Resources\Founds\Schemas\FoundInfolist;
use App\Filament\Resources\Founds\Tables\FoundsTable;
use App\Models\Found;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FoundResource extends Resource
{
    protected static ?string $model = Found::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FoundForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FoundInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FoundsTable::configure($table);
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
            'index' => ListFounds::route('/'),
            'create' => CreateFound::route('/create'),
            'view' => ViewFound::route('/{record}'),
            'edit' => EditFound::route('/{record}/edit'),
        ];
    }
}
