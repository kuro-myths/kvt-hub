<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('learning_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained('learning_enrollments')->onDelete('cascade');
            $table->foreignId('module_id')->constrained('learning_modules')->onDelete('cascade');
            $table->datetime('completed_at')->nullable();
            $table->float('quiz_score')->nullable();
            $table->integer('time_spent_minutes')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('enrollment_id');
            $table->index('module_id');
            $table->unique(['enrollment_id', 'module_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_completions');
    }
};
