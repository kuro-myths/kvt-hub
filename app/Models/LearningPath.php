<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningPath extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'language_id',
        'title',
        'description',
        'level',
        'duration_hours',
        'ai_generated',
        'modules_count',
        'is_published',
        'cover_image',
    ];

    protected $casts = [
        'ai_generated' => 'boolean',
        'modules_count' => 'integer',
        'is_published' => 'boolean',
    ];

    public function language()
    {
        return $this->belongsTo(ProgrammingLanguage::class, 'language_id');
    }

    public function modules()
    {
        return $this->hasMany(LearningModule::class, 'path_id');
    }

    public function enrollments()
    {
        return $this->hasMany(LearningEnrollment::class, 'path_id');
    }
}
