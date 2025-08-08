<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;

enum BusinessModel: string implements HasLabel
{
    use HasLocalizedInformation;

    case Subscription = 'subscription';
    case TransactionFee = 'transaction_fee';
    case Freemium = 'freemium';
    case Licensing = 'licensing';
    case Ads = 'ads';
}
