<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Organization;
use App\Models\Enums\Country;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;

/**
 * @property-read int $founded_year
 * @property-read float|null $check_size_min
 * @property-read float|null $check_size_max
 * @property-read string $city
 * @property-read boolean $is_lead_investor
 * @property-read boolean $is_follow_investor
 * @property-read \App\Models\Enums\Region $focus_region
 * @property-read \App\Models\Enums\InvestmentModel $investment_model
 * @property-read \App\Models\Enums\Country $country
 */
final class Found extends Organization
{
    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'check_size_min' => 'integer',
            'check_size_max' => 'integer',
            'is_lead_investor' => 'boolean',
            'is_follow_investor' => 'boolean',
            'investment_model' => InvestmentModel::class,
            'country' => Country::class,
            'focus_region' => Region::class,
        ];
    }
}
