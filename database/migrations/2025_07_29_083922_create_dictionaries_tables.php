<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->applyForDictionaries(function (string $table): void {
            Schema::create($table, function (Blueprint $table): void {
                $table->id();
                $table->uuid()->unique();
                $table->string('key', 40)->unique()->index();
                $table->json('name');
                $table->unsignedInteger('sort_order')->default(0)->index();
                $table->boolean('is_active')->default(false)->index();
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->applyForDictionaries(fn(string $table) => Schema::dropIfExists($table));
    }

    /**
     * Apply given callback for all Dictionariable Models
     */
    protected function applyForDictionaries(Closure $callback): void
    {
        $modelsPath = app_path('Models/Dictionaries');
        $files = File::files($modelsPath);

        foreach ($files as $file) {
            $className = pathinfo($file, PATHINFO_FILENAME);
            $fullClass = "App\\Models\\Dictionaries\\$className";

            if (! class_exists($fullClass)) {
                continue;
            }

            $table = (new $fullClass())->getTable();

            ($callback)($table);
        }
    }
};
