<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Pages;

use App\Filament\Resources\Investors\InvestorResource;
use Filament\Resources\Pages\ManageRecords;

final class ListInvestors extends ManageRecords
{
    protected static string $resource = InvestorResource::class;
}
