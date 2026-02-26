<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_session_id',
        'role',
        'content',
        'message_type',
        'metadata',
        'tokens_used',
        'is_edited',
        'edit_history',
    ];

    protected $casts = [
        'metadata' => 'json',
        'is_edited' => 'boolean',
        'tokens_used' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship: Session yang memiliki message ini
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(ChatSession::class, 'chat_session_id');
    }

    /**
     * Relationship: Feedback untuk message ini
     */
    public function feedbacks(): HasMany
    {
        return $this->hasMany(ChatFeedback::class, 'chat_message_id');
    }

    /**
     * Get average rating dari feedbacks
     */
    public function getAverageRating(): ?float
    {
        return $this->feedbacks()
            ->whereNotNull('rating')
            ->avg('rating');
    }

    /**
     * Check if message was AI response
     */
    public function isAssistantMessage(): bool
    {
        return $this->role === 'assistant';
    }

    /**
     * Check if message is user input
     */
    public function isUserMessage(): bool
    {
        return $this->role === 'user';
    }
}
