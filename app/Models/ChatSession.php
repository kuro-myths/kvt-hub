<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'session_token',
        'title',
        'context',
        'message_count',
        'total_tokens_used',
        'api_cost',
        'status',
    ];

    protected $casts = [
        'total_tokens_used' => 'integer',
        'api_cost' => 'decimal:4',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relationship: User yang memiliki session chat ini
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Semua pesan dalam session ini
     */
    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    /**
     * Get pembuka session
     */
    public function getFirstMessage()
    {
        return $this->messages()->where('role', 'user')->first();
    }

    /**
     * Generate unique session token
     */
    public static function generateToken(): string
    {
        return 'sess_' . bin2hex(random_bytes(16));
    }

    /**
     * Create new session untuk user atau guest
     */
    public static function createSession(?int $userId = null, ?string $title = null): self
    {
        return static::create([
            'user_id' => $userId,
            'session_token' => static::generateToken(),
            'title' => $title ?? 'Chat ' . now()->format('d M Y H:i'),
            'status' => 'active',
        ]);
    }
}
