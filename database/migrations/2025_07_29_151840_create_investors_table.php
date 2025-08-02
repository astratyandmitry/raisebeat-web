<?php

declare(strict_types=1);

use App\Models\Enums\Region;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('investors', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->decimal('check_size_min')->nullable();
            $table->decimal('check_size_max')->nullable();
            $table->string('focus_headline', 120);
            $table->string('focus_region', 40)->comment(Region::class)->index();
            $table->timestamps();

            $table->index(['check_size_min', 'check_size_max']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
