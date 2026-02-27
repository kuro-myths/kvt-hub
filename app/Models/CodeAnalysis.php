<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodeAnalysis extends Model
{
    use SoftDeletes;

    protected $table = 'code_analyses';

    protected $fillable = [
        'snippet_id',
        'language_id',
        'code_quality_score',
        'complexity_score',
        'readability_score',
        'performance_score',
        'security_score',
        'issues_found',
        'suggestions',
        'improvements',
        'explanation',
        'tokens_used',
        'ai_model',
    ];

    protected $casts = [
        'code_quality_score' => 'float',
        'complexity_score' => 'float',
        'readability_score' => 'float',
        'performance_score' => 'float',
        'security_score' => 'float',
        'issues_found' => 'array',
        'suggestions' => 'array',
        'improvements' => 'array',
        'tokens_used' => 'integer',
    ];

    public function snippet()
    {
        return $this->belongsTo(CodeSnippet::class, 'snippet_id');
    }

    public function language()
    {
        return $this->belongsTo(ProgrammingLanguage::class, 'language_id');
    }

    // Get overall score (average of all metrics)
    public function getOverallScore()
    {
        return round((
            $this->code_quality_score +
            $this->complexity_score +
            $this->readability_score +
            $this->performance_score +
            $this->security_score
        ) / 5, 2);
    }

    // Get score grade (A, B, C, D, F)
    public function getGrade()
    {
        $score = $this->getOverallScore();
        return match(true) {
            $score >= 90 => 'A',
            $score >= 80 => 'B',
            $score >= 70 => 'C',
            $score >= 60 => 'D',
            default => 'F',
        };
    }

    // Get grade color
    public function getGradeColor()
    {
        return match($this->getGrade()) {
            'A' => 'green',
            'B' => 'lightgreen',
            'C' => 'yellow',
            'D' => 'orange',
            'F' => 'red',
        };
    }
}
