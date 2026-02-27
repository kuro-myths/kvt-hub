<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningModule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'path_id',
        'title',
        'description',
        'order',
        'content',
        'code_example',
        'ai_explanation',
        'quiz_questions',
    ];

    protected $casts = [
        'order' => 'integer',
        'quiz_questions' => 'array',
    ];

    public function path()
    {
        return $this->belongsTo(LearningPath::class, 'path_id');
    }

    public function completions()
    {
        return $this->hasMany(LearningCompletion::class, 'module_id');
    }
}
