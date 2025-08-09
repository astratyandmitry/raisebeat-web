<?php

declare(strict_types=1);

use App\Models\Enums\Quarter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accelerator_participants', function (Blueprint $table): void {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('accelerator_id')->constrained();
            $table->foreignId('startup_id')->constrained();
            $table->unsignedInteger('year');
            $table->enum('quarter', array_keys(Quarter::getOptions()));
            $table->boolean('is_confirmed')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accelerator_participants');
    }
};
