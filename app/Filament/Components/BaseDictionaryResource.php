<?php

declare(strict_types=1);

namespace App\Filament\Components;

use App\Filament\Components\Translatable\FormTranslatableField;
use App\Filament\Components\Translatable\InfolistTranslatableTextEntry;
use App\Models\Abstracts\Model;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use UnitEnum;

abstract class BaseDictionaryResource extends Resource
{
    protected static null|string|UnitEnum $navigationGroup = 'Dictionaries';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Grid::make()->schema([
                    TextInput::make('uuid')
                        ->label('UUID')
                        ->disabled()
                        ->visibleOn(Operation::Edit)
                        ->required(),
                    TextInput::make('key')
                        ->disabledOn('edit')
                        ->alphaDash()
                        ->unique()
                        ->maxlength(40)
                        ->required(),
                ]),

                FormTranslatableField::make('name', 'Name'),

                Checkbox::make('is_active')
                    ->visibleOn(Operation::Create),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderRecordsTriggerAction(
                fn(Action $action, bool $isReordering): Action => $action
                    ->button()
                    ->label($isReordering ? 'Disable reordering' : 'Enable reordering'),
            )
            ->paginated(false)
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('id')
                    ->width(40)
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Entity')
                    ->description(fn($record) => $record->key)
                    ->searchable(['name', 'key']),
                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->width(80),
                TextColumn::make('created_at')
                    ->label('Date')
                    ->description(fn(Model $record) => $record->updated_at->format('Y-m-d H:i'))
                    ->width(120)
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                ]),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')->label('UUID')->inlineLabel(),
                TextEntry::make('key')->label('Key')->inlineLabel(),
                InfolistTranslatableTextEntry::make('name', 'Name'),
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'key'];
    }
}
