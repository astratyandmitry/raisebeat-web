<?php

declare(strict_types=1);

use App\Models\Enums\InteractionStatus;
use App\Models\Enums\InteractionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interactions', function (Blueprint $table): void {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('user_id')->constrained();
            $table->morphs('from_entity');
            $table->morphs('to_entity');
            $table->string('type', 40)->index()->comment(InteractionType::class);
            $table->string('status', 40)->index()->comment(InteractionStatus::class);
            $table->text('message')->nullable();
            $table->json('data')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};
