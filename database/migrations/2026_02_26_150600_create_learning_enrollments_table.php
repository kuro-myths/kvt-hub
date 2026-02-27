<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('learning_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('path_id')->constrained('learning_paths')->onDelete('cascade');
            $table->float('progress_percentage')->default(0);
            $table->datetime('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('path_id');
            $table->index('completed_at');
            $table->unique(['user_id', 'path_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_enrollments');
    }
};
