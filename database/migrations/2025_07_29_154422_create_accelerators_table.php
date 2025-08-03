<?php

declare(strict_types=1);

use App\Models\Enums\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accelerators', function (Blueprint $table): void {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('user_id')->constrained();
            $table->string('slug', 40)->unique()->index();
            $table->string('name', 40)->unique();
            $table->string('headline', 120)->nullable();
            $table->text('description')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('contact_website', 240)->nullable();
            $table->string('contact_email', 80)->nullable();
            $table->string('contact_phone', 20)->nullable();
            $table->unsignedInteger('founded_year');
            $table->string('country', 2)->comment(Country::class);
            $table->string('city', 40);
            $table->unsignedInteger('count_viewed')->default(0);
            $table->boolean('is_public')->default(false)->index();
            $table->timestamps();

            $table->index(['name', 'headline']);
            $table->index(['country', 'city']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accelerators');
    }
};
