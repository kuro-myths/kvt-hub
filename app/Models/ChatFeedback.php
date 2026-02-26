<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_message_id',
        'user_id',
        'rating',
        'feedback_type',
        'comment',
        'is_anonymous',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_anonymous' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship: Message yang di-feedback
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(ChatMessage::class, 'chat_message_id');
    }

    /**
     * Relationship: User yang memberikan feedback
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get label untuk rating
     */
    public function getRatingLabel(): string
    {
        return match($this->rating) {
            1 => '⭐ Sangat Tidak Puas',
            2 => '⭐⭐ Kurang Puas',
            3 => '⭐⭐⭐ Cukup',
            4 => '⭐⭐⭐⭐ Puas',
            5 => '⭐⭐⭐⭐⭐ Sangat Puas',
            default => 'Tanpa Rating',
        };
    }
}
