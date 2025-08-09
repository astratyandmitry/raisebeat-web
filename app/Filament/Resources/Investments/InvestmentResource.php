<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investments;

use App\Filament\Resources\Investments\Pages\ManageInvestments;
use App\Filament\Resources\Investments\Schemas\InvestmentForm;
use App\Filament\Resources\Investments\Schemas\InvestmentInfolist;
use App\Filament\Resources\Investments\Schemas\InvestmentsTable;
use App\Models\Investment;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

final class InvestmentResource extends Resource
{
    protected static ?string $model = Investment::class;

    protected static null|string|UnitEnum $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return InvestmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InvestmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvestmentsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageInvestments::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
