<?php

namespace App\Models\Enums;

enum SocialLinkType: string
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
