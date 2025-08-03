<?php

declare(strict_types=1);

use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use App\Models\Enums\StartupStage;
use App\Models\Enums\TeamSize;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('startups', function (Blueprint $table): void {
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
            $table->string('market_problem', 1000);
            $table->string('market_solution', 1000);
            $table->string('market_region', 20)->comment(Region::class);
            $table->string('country', 2)->comment(Country::class);
            $table->string('city', 40);
            $table->unsignedInteger('founded_year', 4);
            $table->string('business_model', 40);
            $table->string('stage', 10)->comment(StartupStage::class);
            $table->string('fundraising_status', 20)->comment(FundraisingStatus::class);
            $table->string('fundraising_round', 10)->nullable()->comment(FundraisingRound::class);
            $table->string('team_size', 10)->comment(TeamSize::class);
            $table->string('demo_url')->nullable();
            $table->string('deck_url')->nullable();
            $table->boolean('is_demo_private')->default(false)->index();
            $table->boolean('is_deck_private')->default(false)->index();
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
        Schema::dropIfExists('startups');
    }
};
