<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors;

use App\Filament\Resources\Investors\Pages\CreateInvestor;
use App\Filament\Resources\Investors\Pages\EditInvestor;
use App\Filament\Resources\Investors\Pages\ListInvestors;
use App\Filament\Resources\Investors\Pages\ViewInvestor;
use App\Filament\Resources\Investors\Schemas\InvestorForm;
use App\Filament\Resources\Investors\Schemas\InvestorInfolist;
use App\Filament\Resources\Investors\Tables\InvestorsTable;
use App\Models\Investor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class InvestorResource extends Resource
{
    protected static ?string $model = Investor::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-scale';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return InvestorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InvestorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvestorsTable::configure($table);
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
            'index' => ListInvestors::route('/'),
            'create' => CreateInvestor::route('/create'),
            'view' => ViewInvestor::route('/{record}'),
            'edit' => EditInvestor::route('/{record}/edit'),
        ];
    }
}
