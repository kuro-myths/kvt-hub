<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgrammingLanguage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'version',
        'timeout_seconds',
        'is_active',
        'description',
        'example_code',
        'syntax_highlighting_mode',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'timeout_seconds' => 'integer',
    ];

    public function codeSnippets()
    {
        return $this->hasMany(CodeSnippet::class, 'language_id');
    }

    public function executions()
    {
        return $this->hasMany(CodeExecution::class, 'language_id');
    }

    public function learningPaths()
    {
        return $this->hasMany(LearningPath::class, 'language_id');
    }

    // Get display name with version
    public function getDisplayName()
    {
        return $this->name . ' v' . $this->version;
    }

    // Check if language is available
    public function isAvailable()
    {
        return $this->is_active;
    }
}
