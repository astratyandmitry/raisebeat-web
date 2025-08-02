<?php

declare(strict_types=1);

use App\Models\Enums\SocialLinkType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table): void {
            $table->id();
            $table->uuid()->unique();
            $table->string('linkable_type');
            $table->unsignedInteger('linkable_id');
            $table->string('type', 40)->comment(SocialLinkType::class);
            $table->string('url', 240);
            $table->timestamps();

            $table->index(['linkable_type', 'linkable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
