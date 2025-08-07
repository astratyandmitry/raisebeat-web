<?php

declare(strict_types=1);

namespace App\Filament\Resources\Admins;

use App\Filament\Resources\Admins\Pages\ManageAdmins;
use App\Models\Admin;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use UnitEnum;

final class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static null|string|UnitEnum $navigationGroup = 'System';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->columnSpanFull()
                    ->visibleOn(Operation::Edit)
                    ->disabled()
                    ->required(),
                TextInput::make('name')
                    ->maxLength(80)
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->maxLength(80)
                    ->unique()
                    ->required(),

                // Create
                TextInput::make('password')
                    ->password()
                    ->minLength(8)
                    ->hiddenOn(Operation::Edit)
                    ->columnSpanFull()
                    ->required(),

                // Update
                TextInput::make('new_password')
                    ->hiddenOn(Operation::Create)
                    ->minLength(8)
                    ->password()
                    ->confirmed(),
                TextInput::make('new_password_confirmation')
                    ->hiddenOn(Operation::Create)
                    ->minLength(8)
                    ->password()
                    ->requiredWith('new_password'),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('created_at')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('updated_at')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('deleted_at')
                    ->placeholder('Entity is not deleted')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                TextColumn::make('id')
                    ->width(40)
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),
                IconColumn::make('deleted_at')
                    ->label('Status')
                    ->trueColor('danger')
                    ->icon('heroicon-o-trash')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make()
                        ->mutateDataUsing(function (array $data): array {
                            if (isset($data['new_password']) && filled($data['new_password'])) {
                                $data['password'] = Hash::make($data['new_password']);
                            }

                            unset($data['new_password'], $data['new_password_confirmation']);

                            return $data;
                        }),
                    DeleteAction::make(),
                    ForceDeleteAction::make()->hidden(),
                    RestoreAction::make(),
                ]),
            ])
            ->filters([
                TrashedFilter::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageAdmins::route('/'),
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
