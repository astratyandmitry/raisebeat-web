<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Abstracts\Organization;
use App\Models\Accelerator;
use App\Models\Enums\InteractionStatus;
use App\Models\Enums\InteractionType;
use App\Models\Found;
use App\Models\Interaction;
use App\Models\Investor;
use App\Models\Media;
use App\Models\Startup;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

final class InteractionSeeder extends Seeder
{
    private array $data = [
        [
            'type' => InteractionType::RequestDemoAccess,
            'from' => [Investor::class, Found::class, Accelerator::class, Media::class],
            'to' => [Startup::class],
        ],
        [
            'type' => InteractionType::RequestDeckAccess,
            'from' => [Investor::class, Found::class, Accelerator::class],
            'to' => [Startup::class],
        ],
        [
            'type' => InteractionType::ApplyForProgram,
            'from' => [Startup::class],
            'to' => [Accelerator::class],
        ],
        [
            'type' => InteractionType::ProposeInvestment,
            'from' => [Investor::class, Found::class, Accelerator::class],
            'to' => [Startup::class],
        ],
        [
            'type' => InteractionType::InviteToPitch,
            'from' => [Investor::class, Found::class, Accelerator::class],
            'to' => [Startup::class],
        ],
        [
            'type' => InteractionType::SubmitNews,
            'from' => [Startup::class, Investor::class, Found::class, Accelerator::class],
            'to' => [Media::class],
        ],
        [
            'type' => InteractionType::InviteToTeam,
            'from' => [Startup::class, Found::class, Accelerator::class, Media::class],
            'to' => [User::class],
        ],
    ];

    public function run(): void
    {
        foreach ($this->data as $data) {
            for ($i = 0; $i < random_int(3, 10); $i++) {
                [$from_user_id, $from_model] = $this->getInteractable($data['from']);
                [$to_user_id, $to_model] = $this->getInteractable($data['to']);

                Interaction::query()->create([
                    'from_entity_type' => $from_model::class,
                    'from_entity_id' => $from_model->id,
                    'to_entity_type' => $to_model::class,
                    'to_entity_id' => $to_model->id,
                    'user_id' => $from_user_id,
                    'type' => $data['type'],
                    'status' => $status =Arr::random(InteractionStatus::cases()),
                    'reviewed_at' => $status === InteractionStatus::Pending ? null : now(),
                    'message' => $status === InteractionStatus::Rejected ? 'Rejected reason' : null,
                ]);
            }
        }
    }

    /**
     * @return array<int, \App\Models\Abstracts\Organization|\App\Models\User>
     */
    private function getInteractable(array $classes): array
    {
        /** @var \App\Models\User|Organization $model */
        $model = Arr::random($classes)::query()->inRandomOrder()->first();

        if ($model instanceof User) {
            return [$model->id, $model];
        }

        return [$model->user_id, $model];
    }
}
