<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('learning_modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('path_id')->constrained('learning_paths')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->longText('content')->nullable();
            $table->longText('code_example')->nullable();
            $table->longText('ai_explanation')->nullable();
            $table->json('quiz_questions')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('path_id');
            $table->index('order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_modules');
    }
};
