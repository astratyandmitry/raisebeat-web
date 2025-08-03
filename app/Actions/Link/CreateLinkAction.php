<?php

namespace App\Actions\Link;

use App\Models\Contracts\Linkable;
use App\Models\Enums\LinkType;
use App\Models\Link;

final readonly class CreateLinkAction
{
    public function execute(Linkable $linkable, LinkType $type, string $url): Link
    {
        return $linkable->links()->create([
            'type' => $type,
            'url' => $url,
        ]);
    }
}
