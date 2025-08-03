<?php

declare(strict_types=1);

namespace App\Actions\Link;

use App\Models\Enums\LinkType;
use App\Models\Link;

final readonly class UpdateLinkAction
{
    public function execute(Link $link, LinkType $type, string $url): Link
    {
        $link->update([
            'type' => $type,
            'url' => $url,
        ]);

        return $link;
    }
}
