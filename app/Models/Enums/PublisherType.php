<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;

enum PublisherType: string implements HasLabel
{
    use HasLocalizedInformation;

    case NewsSite = 'news-site';
    case Blog = 'blog';
    case Podcast = 'podcast';
    case Youtube = 'youtube';
    case Telegram = 'telegram';
    case Community = 'community';
}
