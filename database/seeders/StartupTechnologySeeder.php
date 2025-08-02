<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Dictionaries\StartupTechnology;

final class StartupTechnologySeeder extends DictionarySeeder
{
    protected array $data = [
        'ai' => 'AI',
        'ml' => 'ML',
        'nlp' => 'NLP',
        'gen_ai' => 'Gen AI',
        'comp_vision' => 'Computer Vision',
        'blockchain' => 'Blockchain',
        'iot' => 'IoT',
        'ar_vr' => 'AR/VR',
        'cloud' => 'Cloud',
        'big_data' => 'Big Data',
        'analytics' => 'Analytics',
        'drones' => 'Drones',
        'cyber_sec' => 'Cybersecurity',
        'automation' => 'Automation',
    ];

    protected function getModelClassName(): string
    {
        return StartupTechnology::class;
    }
}
