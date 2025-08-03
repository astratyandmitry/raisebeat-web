<?php

declare(strict_types=1);

namespace App\Actions\Link;

use App\Models\Link;

final readonly class DeleteLinkAction
{
    public function execute(Link $link): void
    {
        $link->delete();
    }
}
