<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodeSnippet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'language_id',
        'title',
        'description',
        'code',
        'input_example',
        'expected_output',
        'difficulty_level',
        'tags',
        'is_public',
        'is_featured',
        'views_count',
        'likes_count',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_public' => 'boolean',
        'is_featured' => 'boolean',
        'views_count' => 'integer',
        'likes_count' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(ProgrammingLanguage::class, 'language_id');
    }

    public function executions()
    {
        return $this->hasMany(CodeExecution::class, 'snippet_id');
    }

    public function aiAnalysis()
    {
        return $this->hasOne(CodeAnalysis::class, 'snippet_id');
    }

    // Get difficulty color badge
    public function getDifficultyColor()
    {
        return match($this->difficulty_level) {
            'beginner' => 'green',
            'intermediate' => 'yellow',
            'advanced' => 'red',
            'expert' => 'purple',
            default => 'gray',
        };
    }

    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function toggleLike()
    {
        $this->is_liked ? $this->decrement('likes_count') : $this->increment('likes_count');
        $this->is_liked = !$this->is_liked;
        return $this->save();
    }
}
