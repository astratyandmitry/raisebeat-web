<?php

use App\Models\Enums\MediaType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
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
            $table->string('type', 20)->comment(MediaType::class);
            $table->string('submission_url', 240)->nullable();
            $table->boolean('is_public')->default(false)->index();
            $table->timestamps();

            $table->index(['name', 'headline']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
