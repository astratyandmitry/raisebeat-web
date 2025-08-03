<?php

use App\Models\Enums\ActivityType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->morphs('performable');
            $table->morphs('subjectable');
            $table->string('type', 40)->comment(ActivityType::class);
            $table->json('data')->nullable();
            $table->timestamps();

            $table->index(['performable_type', 'performable_id']);
            $table->index(['subjectable_type', 'subjectable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
