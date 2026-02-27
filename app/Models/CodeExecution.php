<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodeExecution extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'language_id',
        'snippet_id',
        'code',
        'input_data',
        'output_data',
        'error_message',
        'execution_time_ms',
        'memory_usage_mb',
        'status',
        'ai_explanation',
    ];

    protected $casts = [
        'execution_time_ms' => 'float',
        'memory_usage_mb' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(ProgrammingLanguage::class, 'language_id');
    }

    public function snippet()
    {
        return $this->belongsTo(CodeSnippet::class, 'snippet_id');
    }

    public function isSuccess()
    {
        return $this->status === 'success';
    }

    public function isError()
    {
        return $this->status === 'error';
    }

    public function isTimeout()
    {
        return $this->status === 'timeout';
    }

    // Get status badge color
    public function getStatusColor()
    {
        return match($this->status) {
            'success' => 'green',
            'error' => 'red',
            'timeout' => 'orange',
            'running' => 'blue',
            default => 'gray',
        };
    }
}
