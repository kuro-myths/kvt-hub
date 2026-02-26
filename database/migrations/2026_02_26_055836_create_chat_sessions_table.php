<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chat_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('session_token')->unique();
            $table->string('title')->default('Chat Session');
            $table->text('context')->nullable()->comment('Knowledge base context untuk chatbot');
            $table->integer('message_count')->default(0);
            $table->decimal('total_tokens_used', 10, 0)->default(0)->comment('Total tokens digunakan dari OpenAI API');
            $table->decimal('api_cost', 10, 4)->default(0)->comment('Estimasi biaya API');
            $table->enum('status', ['active', 'archived', 'deleted'])->default('active');
            $table->timestamps();
            $table->softDeletes();
            $table->index('session_token');
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_sessions');
    }
};
