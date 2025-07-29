<?php

namespace Database\Seeders;

use App\Models\Dictionaries\StartupIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class StartupIndustrySeeder extends DictionarySeeder
{
    protected array $data = [
        'finances' => 'Finances',
        'education' => 'Education',
        'health' => 'Health',
        'medicine' => 'Medicine',
        'agro' => 'Agro',
        'insurance' => 'Insurance',
        'legal' => 'Legal',
        'property' => 'Property',
        'hr' => 'hr',
        'government' => 'Government',
        'food' => 'Food',
        'travel' => 'Travel',
        'social' => 'Social',
        'sport' => 'Sport',
        'robotics' => 'Robotics',
        'logistics' => 'Logistics',
    ];

    protected function getModelClassName(): string
    {
        return StartupIndustry::class;
    }
}
