<?php

use App\Models\StartupMetric;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('startup_metrics', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('startup_id')->constrained();
            $table->string('type', 40)->index()->comment(StartupMetric::class);
            $table->unsignedInteger('year', 4);
            $table->enum('quarter', ['q1', 'q2', 'q3', 'q4']);
            $table->double('value');
            $table->boolean('is_confirmed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('startup_metrics');
    }
};
