<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupProductTypes\Pages;

use App\Filament\Resources\StartupProductTypes\StartupProductTypeResource;
use App\Models\Dictionaries\StartupProductType;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

final class ListStartupProductTypes extends ListRecords
{
    protected static string $resource = StartupProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->badge(StartupProductType::query()->count()),
            'active' => Tab::make()
                ->badge(StartupProductType::query()->where('is_active', true)->count())
                ->badgeColor('success')
                ->modifyQueryUsing(fn($query) => $query->where('is_active', true)),
            'inactive' => Tab::make()
                ->badge(StartupProductType::query()->where('is_active', false)->count())
                ->badgeColor('danger')
                ->modifyQueryUsing(fn($query) => $query->where('is_active', false)),
        ];
    }
}
