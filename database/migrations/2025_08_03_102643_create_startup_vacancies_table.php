<?php

use App\Models\Enums\VacancyType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('startup_vacancies', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('startup_id')->constrained();
            $table->string('type', 40)->index()->comment(VacancyType::class);
            $table->string('title', 200);
            $table->string('description', 1000);
            $table->longText('content');
            $table->string('feedback_email', 80);
            $table->unsignedInteger('count_views')->default(0);
            $table->boolean('is_applicable')->default(false)->index9;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('startup_vacancies');
    }
};
