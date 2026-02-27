<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningCompletion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'enrollment_id',
        'module_id',
        'completed_at',
        'quiz_score',
        'time_spent_minutes',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'quiz_score' => 'float',
        'time_spent_minutes' => 'integer',
    ];

    public function enrollment()
    {
        return $this->belongsTo(LearningEnrollment::class, 'enrollment_id');
    }

    public function module()
    {
        return $this->belongsTo(LearningModule::class, 'module_id');
    }

    public function isCompleted()
    {
        return $this->completed_at !== null;
    }
}
