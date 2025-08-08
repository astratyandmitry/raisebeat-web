<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors;

use App\Filament\Resources\Investors\Pages\ListInvestors;
use App\Filament\Resources\Investors\Schemas\InvestorInfolist;
use App\Filament\Resources\Investors\Schemas\InvestorsTable;
use App\Models\Investor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

final class InvestorResource extends Resource
{
    protected static ?string $model = Investor::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-scale';

    protected static ?int $navigationSort = 5;

    public static function infolist(Schema $schema): Schema
    {
        return InvestorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvestorsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInvestors::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['user.first_name', 'user.last_name', 'user.username'];
    }

    /**
     * @param \App\Models\Investor $record
     * @return array|string[]
     */
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'user' => $record->user->getDisplayLabel(),
        ];
    }
}
