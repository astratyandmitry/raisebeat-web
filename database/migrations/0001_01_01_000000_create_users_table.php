<?php

use App\Models\Enums\Country;
use App\Models\Enums\Language;
use App\Models\Enums\Timezone;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('email', 80)->unique();
            $table->timestamp('email_verified_at')->nullable()->index();
            $table->string('password');
            $table->rememberToken();
            $table->string('first_name', 40);
            $table->string('last_name', 40);
            $table->string('username', 40)->unique()->index();
            $table->string('headline', 120)->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('country', 2)->nullable()->comment(Country::class);
            $table->string('city', 40)->nullable();
            $table->string('timezone', 9)->comment(Timezone::class);
            $table->string('language', 2)->comment(Language::class);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_blocked')->default(false);
            $table->timestamps();

            $table->index(['country', 'city']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
