<?php

declare(strict_types=1);

use App\Models\Enums\PublisherType;
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
        Schema::create('publishers', function (Blueprint $table): void {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('slug', 40)->unique()->index();
            $table->string('name', 40)->unique();
            $table->string('headline', 120)->nullable();
            $table->text('description')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('contact_website', 240)->nullable();
            $table->string('contact_email', 80)->nullable();
            $table->string('contact_phone', 20)->nullable();
            $table->string('type', 20)->index()->comment(PublisherType::class);
            $table->string('official_url', 250);
            $table->string('submission_url', 250)->nullable();
            $table->unsignedInteger('count_viewed')->default(0);
            $table->boolean('is_public')->default(false)->index();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['name', 'headline']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishers');
    }
};
