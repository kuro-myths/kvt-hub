<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('programming_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Python, JavaScript, PHP, Ruby, etc
            $table->string('slug')->unique(); // python, javascript, php, etc
            $table->string('icon')->default('fas fa-code'); // FontAwesome icon
            $table->string('version')->default('1.0'); // Language version
            $table->integer('timeout_seconds')->default(5); // Execution timeout
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->longText('example_code')->nullable();
            $table->string('syntax_highlighting_mode')->default('python'); // highlight.js mode
            $table->timestamps();
            $table->softDeletes();

            $table->index('slug');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programming_languages');
    }
};
