<?php

namespace App\Http\Controllers;

use App\Models\CodeSnippet;
use App\Models\ProgrammingLanguage;
use App\Models\CodeExecution;
use App\Models\CodeAnalysis;
use App\Models\LearningPath;
use App\Models\LearningEnrollment;
use App\Services\CodeExecutionService;
use App\Services\CodeAssistantService;
use Illuminate\Http\Request;

class CodeExecutorController extends Controller
{
    private $executionService;
    private $assistantService;

    public function __construct(
        CodeExecutionService $executionService,
        CodeAssistantService $assistantService
    ) {
        $this->executionService = $executionService;
        $this->assistantService = $assistantService;
    }

    /**
     * Display code editor dashboard
     */
    public function index()
    {
        $languages = ProgrammingLanguage::where('is_active', true)
            ->orderBy('name')
            ->get();

        $userSnippets = CodeSnippet::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        $recentExecutions = CodeExecution::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('code-executor.index', compact('languages', 'userSnippets', 'recentExecutions'));
    }

    /**
     * Show code editor
     */
    public function editor(string $languageSlug)
    {
        $language = ProgrammingLanguage::where('slug', $languageSlug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('code-executor.editor', compact('language'));
    }

    /**
     * Execute code
     */
    public function execute(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10000',
            'language_id' => 'required|exists:programming_languages,id',
            'input' => 'nullable|string|max:5000',
            'snippet_id' => 'nullable|exists:code_snippets,id',
        ]);

        $language = ProgrammingLanguage::findOrFail($request->language_id);

        $execution = $this->executionService->executeCode(
            code: $request->code,
            language: $language,
            input: $request->input,
            userId: auth()->id(),
            snippetId: $request->snippet_id
        );

        return response()->json([
            'status' => $execution->status,
            'output' => $execution->output_data,
            'error' => $execution->error_message,
            'time_ms' => round($execution->execution_time_ms, 2),
        ]);
    }

    /**
     * Validate code syntax
     */
    public function validate(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'language' => 'required|string',
        ]);

        $validation = $this->executionService->validateSyntax(
            $request->code,
            $request->language
        );

        return response()->json($validation);
    }

    /**
     * Save code snippet
     */
    public function saveSnippet(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string',
            'language_id' => 'required|exists:programming_languages,id',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'difficulty_level' => 'nullable|in:beginner,intermediate,advanced,expert',
            'is_public' => 'nullable|boolean',
        ]);

        $snippet = CodeSnippet::updateOrCreate(
            ['id' => $request->snippet_id],
            [
                'user_id' => auth()->id(),
                'title' => $request->title,
                'code' => $request->code,
                'language_id' => $request->language_id,
                'description' => $request->description,
                'tags' => $request->tags,
                'difficulty_level' => $request->difficulty_level ?? 'beginner',
                'is_public' => $request->is_public ?? false,
            ]
        );

        return response()->json([
            'id' => $snippet->id,
            'message' => 'Snippet saved successfully',
        ]);
    }

    /**
     * Analyze code with AI
     */
    public function analyze(CodeSnippet $snippet)
    {
        $this->authorize('view', $snippet);

        try {
            $analysis = $this->assistantService->analyzeCode($snippet);

            return response()->json([
                'quality_score' => $analysis->code_quality_score,
                'complexity_score' => $analysis->complexity_score,
                'readability_score' => $analysis->readability_score,
                'performance_score' => $analysis->performance_score,
                'security_score' => $analysis->security_score,
                'overall_grade' => $analysis->getGrade(),
                'issues' => $analysis->issues_found,
                'suggestions' => $analysis->suggestions,
                'improvements' => $analysis->improvements,
                'explanation' => $analysis->explanation,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Analysis failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Explain code snippet
     */
    public function explain(CodeSnippet $snippet)
    {
        $this->authorize('view', $snippet);

        try {
            $explanation = $this->assistantService->explainCode($snippet);

            return response()->json([
                'explanation' => $explanation,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Explanation failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Debug code
     */
    public function debug(Request $request, CodeSnippet $snippet)
    {
        $this->authorize('view', $snippet);

        $request->validate([
            'error' => 'required|string',
        ]);

        try {
            $debug = $this->assistantService->debugCode(
                $snippet->code,
                $snippet->language->name,
                $request->error
            );

            return response()->json($debug);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Debug failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Optimize code
     */
    public function optimize(CodeSnippet $snippet)
    {
        $this->authorize('view', $snippet);

        try {
            $optimization = $this->assistantService->optimizeCode($snippet);

            return response()->json($optimization);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Optimization failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get code suggestions
     */
    public function suggestions(Request $request)
    {
        $request->validate([
            'topic' => 'required|string',
            'language_id' => 'required|exists:programming_languages,id',
            'level' => 'nullable|in:beginner,intermediate,advanced',
        ]);

        $language = ProgrammingLanguage::findOrFail($request->language_id);

        try {
            $suggestions = $this->assistantService->generateCodeSuggestions(
                $request->topic,
                $language->name,
                $request->level ?? 'beginner'
            );

            return response()->json([
                'suggestions' => $suggestions,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to generate suggestions: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * View snippet
     */
    public function showSnippet(CodeSnippet $snippet)
    {
        $snippet->incrementViews();
        $analysis = $snippet->aiAnalysis;

        return view('code-executor.snippet', compact('snippet', 'analysis'));
    }

    /**
     * List user snippets
     */
    public function mySnippets()
    {
        $snippets = CodeSnippet::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('code-executor.my-snippets', compact('snippets'));
    }

    /**
     * Explore public snippets
     */
    public function explore(Request $request)
    {
        $query = CodeSnippet::where('is_public', true)
            ->where('is_featured', true)
            ->orderByDesc('likes_count');

        if ($request->language_id) {
            $query->where('language_id', $request->language_id);
        }

        if ($request->difficulty) {
            $query->where('difficulty_level', $request->difficulty);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $snippets = $query->paginate(20);
        $languages = ProgrammingLanguage::where('is_active', true)->get();

        return view('code-executor.explore', compact('snippets', 'languages'));
    }

    /**
     * Get execution history
     */
    public function history()
    {
        $executions = CodeExecution::where('user_id', auth()->id())
            ->with('language')
            ->orderByDesc('created_at')
            ->paginate(50);

        return view('code-executor.history', compact('executions'));
    }

    /**
     * List learning paths
     */
    public function learningPaths()
    {
        $paths = LearningPath::where('is_published', true)
            ->with('language')
            ->paginate(12);

        $enrolled = LearningEnrollment::where('user_id', auth()->id())
            ->pluck('path_id')
            ->toArray();

        return view('code-executor.learning-paths', compact('paths', 'enrolled'));
    }

    /**
     * Enroll in learning path
     */
    public function enrollPath(LearningPath $path)
    {
        $enroll = LearningEnrollment::firstOrCreate([
            'user_id' => auth()->id(),
            'path_id' => $path->id,
        ]);

        return response()->json([
            'enrolled' => true,
            'message' => 'Enrolled in ' . $path->title,
        ]);
    }

    /**
     * View learning path progress
     */
    public function viewPath(LearningPath $path)
    {
        $enrollment = LearningEnrollment::where('user_id', auth()->id())
            ->where('path_id', $path->id)
            ->firstOrFail();

        $modules = $path->modules()->with('completions')->get();

        return view('code-executor.learning-path', compact('path', 'enrollment', 'modules'));
    }

    /**
     * Delete snippet
     */
    public function deleteSnippet(CodeSnippet $snippet)
    {
        $this->authorize('delete', $snippet);
        $snippet->delete();

        return response()->json(['message' => 'Snippet deleted']);
    }

    /**
     * Toggle like on snippet
     */
    public function toggleLike(CodeSnippet $snippet)
    {
        $snippet->toggleLike();

        return response()->json([
            'likes' => $snippet->likes_count,
        ]);
    }
}
