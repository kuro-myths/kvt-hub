<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningEnrollment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'path_id',
        'progress_percentage',
        'completed_at',
    ];

    protected $casts = [
        'progress_percentage' => 'float',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return $this->belongsTo(LearningPath::class, 'path_id');
    }

    public function completions()
    {
        return $this->hasMany(LearningCompletion::class, 'enrollment_id');
    }

    public function isCompleted()
    {
        return $this->completed_at !== null;
    }
}
