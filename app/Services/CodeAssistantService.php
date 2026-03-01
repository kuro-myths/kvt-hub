<?php

namespace App\Services;

use App\Models\ChatSession;
use App\Models\CodeSnippet;
use App\Models\CodeAnalysis;
use App\Models\LearningPath;
use Illuminate\Support\Facades\Log;

class CodeAssistantService
{
    private $chatbotService;

    public function __construct(ChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    /**
     * Get or create a system ChatSession for AI-driven code analysis.
     */
    private function getOrCreateSystemSession(): ChatSession
    {
        $userId = auth()->id() ?? 1;

        return ChatSession::firstOrCreate(
            [
                'user_id' => $userId,
                'context' => 'code-assistant',
                'status' => 'active',
            ],
            [
                'title' => 'Code Assistant',
                'message_count' => 0,
                'total_tokens_used' => 0,
                'api_cost' => 0,
            ]
        );
    }

    /**
     * Send a prompt via ChatbotService using the correct (ChatSession, string) signature.
     */
    private function sendPrompt(string $prompt): ?string
    {
        $session = $this->getOrCreateSystemSession();
        $message = $this->chatbotService->sendMessage($session, $prompt);

        return $message?->content;
    }

    /**
     * Analyze code and generate AI feedback
     */
    public function analyzeCode(CodeSnippet $snippet): CodeAnalysis
    {
        try {
            $prompt = $this->buildAnalysisPrompt($snippet);
            $content = $this->sendPrompt($prompt);

            if (!$content) {
                throw new \Exception('Empty response from AI');
            }

            $analysis = $this->parseAnalysisResponse($content, $snippet);

            return CodeAnalysis::updateOrCreate(
                ['snippet_id' => $snippet->id],
                $analysis
            );

        } catch (\Exception $e) {
            Log::error("Code analysis error: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Generate code suggestions for learning
     */
    public function generateCodeSuggestions(string $topic, string $language, string $level = 'beginner'): array
    {
        $prompt = <<<PROMPT
You are an expert programming tutor. Generate 3 practical code examples for the topic:
Topic: $topic
Language: $language
Difficulty: $level

For each example, provide:
1. Code snippet
2. Brief explanation
3. Key concepts to learn
4. Challenge for the student

Format as JSON array with keys: code, explanation, concepts, challenge
PROMPT;

        try {
            $content = $this->sendPrompt($prompt);

            return json_decode($content, true) ?? [];

        } catch (\Exception $e) {
            Log::error("Code suggestion generation error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Generate AI learning paths for a language
     */
    public function generateLearningPath(string $language, string $level = 'beginner'): LearningPath
    {
        $prompt = <<<PROMPT
Create a comprehensive learning path for learning $language at $level level.

Include:
1. Path title and description
2. 5-8 modules with:
   - Module title
   - Learning objectives
   - Code examples
   - Practice challenges
   - Quiz questions (3 questions per module)

Format as JSON with structure:
{
  "title": "...",
  "description": "...",
  "duration_hours": X,
  "modules": [
    {
      "title": "...",
      "description": "...",
      "content": "...",
      "code_example": "...",
      "quiz_questions": [...]
    }
  ]
}
PROMPT;

        try {
            $content = $this->sendPrompt($prompt);

            $data = json_decode($content, true);
            
            $languageModel = \App\Models\ProgrammingLanguage::where('name', $language)->first();
            
            if (!$languageModel) {
                throw new \Exception("Language not found: $language");
            }

            return LearningPath::create([
                'language_id' => $languageModel->id,
                'title' => $data['title'] ?? "Learn $language - $level",
                'description' => $data['description'] ?? null,
                'level' => $level,
                'duration_hours' => $data['duration_hours'] ?? 20,
                'ai_generated' => true,
                'modules_count' => count($data['modules'] ?? []),
                'is_published' => true,
            ]);

        } catch (\Exception $e) {
            Log::error("Learning path generation error: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Debug code and provide fixes
     */
    public function debugCode(string $code, string $language, string $error): array
    {
        $prompt = <<<PROMPT
I have a bug in my $language code:

Code:
\`\`\`
$code
\`\`\`

Error Message:
$error

Please:
1. Identify the root cause
2. Explain the issue clearly
3. Provide the corrected code
4. Suggest how to prevent this in the future

Format as JSON:
{
  "root_cause": "...",
  "explanation": "...",
  "fixed_code": "...",
  "prevention": "..."
}
PROMPT;

        try {
            $content = $this->sendPrompt($prompt);

            return json_decode($content, true) ?? [];

        } catch (\Exception $e) {
            Log::error("Code debugging error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Explain code in natural language
     */
    public function explainCode(CodeSnippet $snippet): string
    {
        $langName = $snippet->language->name ?? 'Unknown';
        $langSlug = $snippet->language->slug ?? 'text';
        $code = $snippet->code;

        $prompt = <<<PROMPT
Please provide a detailed explanation of this {$langName} code:

\`\`\`{$langSlug}
{$code}
\`\`\`

Include:
1. Overall purpose
2. Line-by-line explanation
3. Key algorithms or patterns used
4. Time and space complexity (if applicable)
5. Potential improvements
6. Real-world use cases
PROMPT;

        try {
            $content = $this->sendPrompt($prompt);

            return $content ?? 'Unable to generate explanation';

        } catch (\Exception $e) {
            Log::error("Code explanation error: " . $e->getMessage());
            return "Unable to generate explanation";
        }
    }

    /**
     * Optimize code for performance
     */
    public function optimizeCode(CodeSnippet $snippet): array
    {
        $langName = $snippet->language->name ?? 'Unknown';
        $langSlug = $snippet->language->slug ?? 'text';
        $code = $snippet->code;

        $prompt = <<<PROMPT
Optimize this {$langName} code for better performance:

\`\`\`{$langSlug}
{$code}
\`\`\`

Provide:
1. Performance analysis of current code
2. Bottlenecks identified
3. Optimized version with explanations
4. Performance improvements (estimated %)
5. Trade-offs to consider

Format as JSON:
{
  "analysis": "...",
  "bottlenecks": [...],
  "optimized_code": "...",
  "improvements": "...",
  "tradeoffs": "..."
}
PROMPT;

        try {
            $content = $this->sendPrompt($prompt);

            return json_decode($content, true) ?? [];

        } catch (\Exception $e) {
            Log::error("Code optimization error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Build analysis prompt
     */
    private function buildAnalysisPrompt(CodeSnippet $snippet): string
    {
        return <<<PROMPT
You are a code quality expert. Analyze this $snippet->language->name code snippet and provide scores (0-100) for:
1. Code Quality
2. Complexity 
3. Readability
4. Performance
5. Security

Also identify:
- Issues/code smells
- Suggestions for improvement
- Specific improvements to make

Format your response as JSON:
{
  "code_quality_score": X,
  "complexity_score": X,
  "readability_score": X,
  "performance_score": X,
  "security_score": X,
  "issues_found": ["issue1", "issue2", ...],
  "suggestions": ["suggestion1", "suggestion2", ...],
  "improvements": ["improvement1", "improvement2", ...],
  "explanation": "overall assessment..."
}

Code to analyze:
\`\`\`$snippet->language->slug
$snippet->code
\`\`\`
PROMPT;
    }

    /**
     * Parse API response into analysis data
     */
    private function parseAnalysisResponse(string $response, CodeSnippet $snippet): array
    {
        try {
            $data = json_decode($response, true);

            return [
                'language_id' => $snippet->language_id,
                'code_quality_score' => $data['code_quality_score'] ?? 0,
                'complexity_score' => $data['complexity_score'] ?? 0,
                'readability_score' => $data['readability_score'] ?? 0,
                'performance_score' => $data['performance_score'] ?? 0,
                'security_score' => $data['security_score'] ?? 0,
                'issues_found' => $data['issues_found'] ?? [],
                'suggestions' => $data['suggestions'] ?? [],
                'improvements' => $data['improvements'] ?? [],
                'explanation' => $data['explanation'] ?? null,
                'tokens_used' => 0,
                'ai_model' => config('chatbot.model'),
            ];
        } catch (\Exception $e) {
            Log::error("Failed to parse analysis response: " . $e->getMessage());
            return [];
        }
    }
}
