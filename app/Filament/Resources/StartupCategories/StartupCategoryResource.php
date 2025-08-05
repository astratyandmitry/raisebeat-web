<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupCategories;

use UnitEnum;
use App\Filament\Resources\StartupCategories\Pages\CreateStartupCategory;
use App\Filament\Resources\StartupCategories\Pages\EditStartupCategory;
use App\Filament\Resources\StartupCategories\Pages\ListStartupCategories;
use App\Filament\Resources\StartupCategories\Pages\ViewStartupCategory;
use App\Filament\Resources\StartupCategories\Schemas\StartupCategoryForm;
use App\Filament\Resources\StartupCategories\Schemas\StartupCategoryInfolist;
use App\Filament\Resources\StartupCategories\Tables\StartupCategoriesTable;
use App\Models\Dictionaries\StartupCategory;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

final class StartupCategoryResource extends Resource
{
    protected static ?string $model = StartupCategory::class;

    protected static null|string|UnitEnum $navigationGroup = 'Dictionaries';

    protected static ?string $recordTitleAttribute = 'Startup Category';

    public static function form(Schema $schema): Schema
    {
        return StartupCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StartupCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StartupCategoriesTable::configure($table);
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
            'index' => ListStartupCategories::route('/'),
            'create' => CreateStartupCategory::route('/create'),
            'view' => ViewStartupCategory::route('/{record}'),
            'edit' => EditStartupCategory::route('/{record}/edit'),
        ];
    }
}
