<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Pages;

use App\Filament\Resources\Investors\InvestorResource;
use Filament\Resources\Pages\ListRecords;

final class ListInvestors extends ListRecords
{
    protected static string $resource = InvestorResource::class;
}
