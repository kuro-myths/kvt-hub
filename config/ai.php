<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Kuro Nexus AI — Multi-Provider Configuration
    |--------------------------------------------------------------------------
    | Konfigurasi untuk Kuro Nexus AI Hub — platform AI yang adaptif,
    | extensible, dan mendukung multi-provider (OpenAI, Claude, n8n, Ollama).
    */

    'default' => env('AI_DEFAULT_PROVIDER', 'openai'),

    /*
    |--------------------------------------------------------------------------
    | AI Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'openai' => [
            'driver' => 'openai',
            'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
            'api_key' => env('OPENAI_API_KEY'),
            'org_id' => env('OPENAI_ORGANIZATION'),
            'max_tokens' => (int) env('OPENAI_MAX_TOKENS', 4096),
            'temperature' => (float) env('OPENAI_TEMPERATURE', 0.7),
            'base_url' => env('OPENAI_BASE_URL', 'https://api.openai.com/v1'),
        ],

        'claude' => [
            'driver' => 'claude',
            'model' => env('CLAUDE_MODEL', 'claude-sonnet-4-20250514'),
            'api_key' => env('ANTHROPIC_API_KEY'),
            'max_tokens' => (int) env('CLAUDE_MAX_TOKENS', 4096),
            'temperature' => (float) env('CLAUDE_TEMPERATURE', 0.7),
            'base_url' => env('CLAUDE_BASE_URL', 'https://api.anthropic.com/v1'),
        ],

        'n8n' => [
            'driver' => 'n8n',
            'base_url' => env('N8N_BASE_URL', 'http://localhost:5678'),
            'api_key' => env('N8N_API_KEY'),
            'webhook_secret' => env('N8N_WEBHOOK_SECRET'),
            'workflows' => [
                'chat' => env('N8N_WORKFLOW_CHAT'),
                'code_review' => env('N8N_WORKFLOW_CODE_REVIEW'),
                'summarize' => env('N8N_WORKFLOW_SUMMARIZE'),
                'translate' => env('N8N_WORKFLOW_TRANSLATE'),
                'custom' => env('N8N_WORKFLOW_CUSTOM'),
            ],
        ],

        'github' => [
            'driver' => 'github',
            'token' => env('GITHUB_TOKEN'),
            'model' => env('GITHUB_AI_MODEL', 'gpt-4o-mini'),
            'base_url' => env('GITHUB_MODELS_URL', 'https://models.inference.ai.azure.com'),
            'max_tokens' => (int) env('GITHUB_AI_MAX_TOKENS', 4096),
            'temperature' => (float) env('GITHUB_AI_TEMPERATURE', 0.7),
        ],

        'ollama' => [
            'driver' => 'ollama',
            'model' => env('OLLAMA_MODEL', 'llama3.1'),
            'base_url' => env('OLLAMA_BASE_URL', 'http://localhost:11434'),
            'max_tokens' => (int) env('OLLAMA_MAX_TOKENS', 4096),
            'temperature' => (float) env('OLLAMA_TEMPERATURE', 0.7),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Pipeline Configuration
    |--------------------------------------------------------------------------
    */
    'pipeline' => [
        'max_steps' => 10,
        'timeout_per_step' => 30,
        'retry_attempts' => 2,
        'log_enabled' => env('AI_PIPELINE_LOG', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Features Toggle
    |--------------------------------------------------------------------------
    */
    'features' => [
        'chat' => true,
        'code_generator' => true,
        'code_review' => true,
        'translator' => true,
        'summarizer' => true,
        'sentiment' => true,
        'tutor' => true,
        'image_analysis' => false,
        'voice' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting (per user per hour)
    |--------------------------------------------------------------------------
    */
    'rate_limits' => [
        'chat' => 60,
        'code_generator' => 30,
        'code_review' => 20,
        'translator' => 40,
        'summarizer' => 30,
        'pipeline' => 10,
    ],

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    */
    'cache' => [
        'enabled' => env('AI_CACHE_ENABLED', true),
        'ttl' => 3600, // 1 hour
        'prefix' => 'kuro_ai_',
    ],
];
