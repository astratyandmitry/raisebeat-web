<?php

declare(strict_types=1);

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum BusinessModel: string
{
    use HasLocalizedInformation;

    case Subscription = 'subscription';
    case TransactionFee = 'transaction_fee';
    case Freemium = 'freemium';
    case Licensing = 'licensing';
    case Ads = 'ads';
}
