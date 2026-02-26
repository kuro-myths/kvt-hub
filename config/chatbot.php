<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Chatbot Configuration
    |--------------------------------------------------------------------------
    */

    'enabled' => env('CHATBOT_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | OpenAI API Configuration
    |--------------------------------------------------------------------------
    */
    'model' => env('CHATBOT_MODEL', 'gpt-4o-mini'),
    'max_tokens' => (int) env('CHATBOT_MAX_TOKENS', 2000),
    'temperature' => (float) env('CHATBOT_TEMPERATURE', 0.7),

    /*
    |--------------------------------------------------------------------------
    | Chatbot Features
    |--------------------------------------------------------------------------
    */
    'features' => [
        'streaming' => true,
        'voice_input' => false,
        'voice_output' => false,
        'image_support' => false,
        'file_upload' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting
    |--------------------------------------------------------------------------
    */
    'rate_limit' => [
        'messages_per_minute' => 10,
        'messages_per_hour' => 100,
        'messages_per_day' => 500,
    ],

    /*
    |--------------------------------------------------------------------------
    | Knowledge Base
    |--------------------------------------------------------------------------
    */
    'knowledge_base' => [
        'include_documentation' => true,
        'include_faqs' => true,
        'include_help_articles' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Cost Limits
    |--------------------------------------------------------------------------
    */
    'cost_limits' => [
        'daily_cost_limit' => 10.00,
        'monthly_cost_limit' => 100.00,
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend UI
    |--------------------------------------------------------------------------
    */
    'ui' => [
        'theme' => 'auto', // 'light', 'dark', 'auto'
        'position' => 'bottom-right', // 'bottom-right', 'bottom-left', 'top-right', 'top-left'
        'show_history' => true,
        'show_feedback' => true,
        'show_suggestions' => true,
    ],
];
