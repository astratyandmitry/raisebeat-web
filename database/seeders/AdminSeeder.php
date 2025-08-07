<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class AdminSeeder extends Seeder
{
    private array $data = [
        [
            'email' => 'astratyandmitry@gmail.com',
            'name' => 'Astatyan Dmitry',
            'password' => 'aveego',
        ],
        [
            'email' => 'admin@raisebeat.asia',
            'name' => 'RaiseBeat',
        ],
    ];

    public function run(): void
    {
        collect($this->data)->each(fn (array $data) => Admin::query()->create([
            ...$data,
            'password' => Hash::make($data['password'] ?? 'password'),
        ]));
    }
}
