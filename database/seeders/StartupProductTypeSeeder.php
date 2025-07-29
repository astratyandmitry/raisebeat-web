<?php

namespace Database\Seeders;

use App\Models\Dictionaries\StartupProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class StartupProductTypeSeeder extends DictionarySeeder
{
    protected array $data = [
        'saas' => 'Saas',
        'mobile' => 'Mobile App',
        'web' => 'Web App',
        'desktop' => 'Desktop App',
        'api' => 'API',
        'hardware' => 'Hardware',
        'iot_device' => 'IoT Device',
        'plugin' => 'Plugin',
        'sdk' => 'SDK',
        'chatbot' => 'Chatbot',
        'digital' => 'Digital',
        'platform' => 'Platform',
        'marketplace' => 'Marketplace',
        'aggregator' => 'Aggregator',
        'tool' => 'Tool',
        'game' => 'Game',
        'vr_ar' => 'VR/AR App',
        'content' => 'Content',
        'erp' => 'ERP',
        'crm' => 'CRM',
    ];

    protected function getModelClassName(): string
    {
        return StartupProductType::class;
    }
}
