<?php

use App\Models\Enums\PostType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('parent_id')->nullable()->constrained('posts');
            $table->foreignId('user_id')->constrained();
            $table->morphs('postable');
            $table->string('type', 40)->index()->comment(PostType::class);
            $table->string('title', 200);
            $table->string('description', 1000)->nullable();
            $table->longText('content')->nullable();
            $table->string('repost_comment', 1000)->nullable();
            $table->string('external_url', 500)->nullable();
            $table->unsignedInteger('count_viewed')->default(0);
            $table->unsignedInteger('count_likes')->default(0);
            $table->unsignedInteger('count_reposts')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
