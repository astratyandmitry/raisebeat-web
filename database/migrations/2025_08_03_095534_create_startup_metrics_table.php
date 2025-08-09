<?php

declare(strict_types=1);

use App\Models\Enums\Quarter;
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
        Schema::create('startup_metrics', function (Blueprint $table): void {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('startup_id')->constrained();
            $table->string('type', 40)->index()->comment(StartupMetric::class);
            $table->unsignedInteger('year');
            $table->enum('quarter', array_keys(Quarter::getOptions()));
            $table->double('value');
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
        Schema::dropIfExists('startup_metrics');
    }
};
