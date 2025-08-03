<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accelerator_participants', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('accelerator_id')->constrained();
            $table->foreignId('startup_id')->constrained();
            $table->unsignedInteger('year', 4);
            $table->enum('quarter', ['q1', 'q2', 'q3', 'q4']);
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
