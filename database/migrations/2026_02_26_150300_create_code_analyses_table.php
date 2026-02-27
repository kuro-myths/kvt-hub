<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('code_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('snippet_id')->constrained('code_snippets')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('programming_languages')->onDelete('cascade');
            $table->float('code_quality_score')->nullable(); // 0-100
            $table->float('complexity_score')->nullable(); // 0-100
            $table->float('readability_score')->nullable(); // 0-100
            $table->float('performance_score')->nullable(); // 0-100
            $table->float('security_score')->nullable(); // 0-100
            $table->json('issues_found')->nullable(); // Array of issues
            $table->json('suggestions')->nullable(); // Array of suggestions
            $table->json('improvements')->nullable(); // Array of improvements
            $table->longText('explanation')->nullable(); // AI generated explanation
            $table->integer('tokens_used')->nullable();
            $table->string('ai_model')->default('gpt-4o-mini');
            $table->timestamps();
            $table->softDeletes();

            $table->index('snippet_id');
            $table->index('language_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('code_analyses');
    }
};
