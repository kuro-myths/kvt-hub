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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_session_id')->constrained('chat_sessions')->onDelete('cascade');
            $table->enum('role', ['user', 'assistant', 'system'])->default('user');
            $table->longText('content');
            $table->string('message_type')->default('text')->comment('text, suggestion, error, info');
            $table->json('metadata')->nullable()->comment('Extra data: token_count, processing_time, model_used, etc');
            $table->integer('tokens_used')->default(0)->comment('Tokens digunakan untuk message ini');
            $table->boolean('is_edited')->default(false);
            $table->text('edit_history')->nullable();
            $table->timestamps();
            $table->index('chat_session_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
