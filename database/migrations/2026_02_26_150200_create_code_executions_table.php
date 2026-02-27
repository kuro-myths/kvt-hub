<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('code_executions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('programming_languages')->onDelete('cascade');
            $table->foreignId('snippet_id')->nullable()->constrained('code_snippets')->onDelete('set null');
            $table->longText('code');
            $table->longText('input_data')->nullable();
            $table->longText('output_data')->nullable();
            $table->longText('error_message')->nullable();
            $table->float('execution_time_ms')->nullable();
            $table->float('memory_usage_mb')->nullable();
            $table->enum('status', ['running', 'success', 'error', 'timeout'])->default('running');
            $table->longText('ai_explanation')->nullable(); // AI generated explanation
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('language_id');
            $table->index('snippet_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('code_executions');
    }
};
