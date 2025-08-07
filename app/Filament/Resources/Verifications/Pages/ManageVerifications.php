<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Pages;

use App\Filament\Resources\Verifications\VerificationResource;
use App\Models\Enums\VerificationStatus;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Support\Facades\DB;

final class ManageVerifications extends ListRecords
{
    protected static string $resource = VerificationResource::class;

    public function getTabs(): array
    {
        $counts = DB::table('verifications')
            ->select(['status', DB::raw('count(*) as count')])
            ->groupBy('status')
            ->pluck('count', 'status');

        $tabs = [
            'all' => Tab::make()->badge($counts->sum()),
        ];

        foreach (VerificationStatus::cases() as $status) {
            $tabs[$status->value] = Tab::make($status->getLabel())
                ->modifyQueryUsing(fn($query) => $query->where('status', $status))
                ->badgeColor($status->getColor())
                ->badge($counts->get($status->value));
        }

        return $tabs;
    }
}
