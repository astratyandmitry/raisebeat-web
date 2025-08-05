<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Schemas;

use App\Models\Enums\VerificationStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class VerificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                TextInput::make('verifiable_type')
                    ->required(),
                TextInput::make('verifiable_id')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(VerificationStatus::class)
                    ->required(),
                TextInput::make('comment'),
                DateTimePicker::make('requested_at'),
                DateTimePicker::make('responded_at'),
            ]);
    }
}
