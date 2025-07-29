<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum OutletType: string
{
    use HasLocalizedInformation;

    case NewsSite = 'news-site';
    case Blog = 'blog';
    case Podcast = 'podcast';
    case Youtube = 'youtube';
    case Telegram = 'telegram';
    case Community = 'community';
}
