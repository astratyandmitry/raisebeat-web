<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

abstract class DictionarySeeder extends Seeder
{
    protected array $data = [
        'b2b' => 'B2B',
        'b2c' => 'B2C',
        'b2g' => 'B2G',
        'c2c' => 'C2C',
        'p2p' => 'P2P',
        'saas' => 'SaaS',
        'marketplace' => 'Marketplace',
        'aggregator' => 'Aggregator',
        'web_platform' => 'Web Platform',
        'mobile_app' => 'Mobile App',
        'api' => 'API',
    ];

    public function run(): void
    {
        collect($this->data)
            ->each(function (string $name, string $key): void {
                $this->getModelClassName()::create([
                    'name' => ['en' => $name, 'ru' => $name],
                    'key' => $key,
                    'is_active' => true,
                ]);
            });
    }

    abstract protected function getModelClassName(): string;
}
