<?php

namespace App\Filament\Resources\AcceleratorParticipants;

use App\Filament\Resources\AcceleratorParticipants\Pages\ManageAcceleratorParticipants;
use App\Filament\Resources\AcceleratorParticipants\Schemas\AcceleratorParticipantForm;
use App\Filament\Resources\AcceleratorParticipants\Schemas\AcceleratorParticipantInfolist;
use App\Filament\Resources\AcceleratorParticipants\Schemas\AcceleratorParticipantsTable;
use App\Models\AcceleratorParticipant;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

final class AcceleratorParticipantResource extends Resource
{
    protected static ?string $model = AcceleratorParticipant::class;

    protected static null|string|\UnitEnum $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Participants';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return AcceleratorParticipantForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AcceleratorParticipantInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcceleratorParticipantsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageAcceleratorParticipants::route('/'),
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
