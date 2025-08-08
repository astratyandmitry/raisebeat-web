<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications;

use App\Filament\Resources\Verifications\Pages\ManageVerifications;
use App\Filament\Resources\Verifications\Schemas\VerificationsTable;
use App\Models\Verification;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

final class VerificationResource extends Resource
{
    protected static ?string $model = Verification::class;

    protected static null|string|UnitEnum $navigationGroup = 'System';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return VerificationsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageVerifications::route('/'),
        ];
    }
}
