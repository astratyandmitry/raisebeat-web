<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum LinkType: string
{
    case LinkedIn = 'linkedin';
    case Facebook = 'facebook';
    case Telegram = 'telegram';
    case Instagram = 'instagram';
    case Twitter = 'twitter';
    case YouTube = 'youtube';
    case Whatsapp = 'whatsapp';
    case Website = 'website';
    case GitHub = 'github';
}
