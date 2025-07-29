<?php

namespace App\Models\Abstracts;

/**
 * @property-read string $slug
 * @property-read string $name
 * @property-read string|null $headline
 * @property-read string|null $description
 * @property-read string|null $logo_url
 * @property-read string|null $contact_website
 * @property-read string|null $contact_email
 * @property-read string|null $contact_phone
 * @property-read boolean $is_public
 */
abstract class Organization extends Model
{
    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }
}
