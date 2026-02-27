<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('learning_paths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained('programming_languages')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->integer('duration_hours')->nullable();
            $table->boolean('ai_generated')->default(true);
            $table->integer('modules_count')->default(0);
            $table->boolean('is_published')->default(false);
            $table->string('cover_image')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('language_id');
            $table->index('level');
            $table->index('is_published');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_paths');
    }
};
