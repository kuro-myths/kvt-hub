<?php

namespace App\Services;

use App\Jobs\ExecuteCodeJob;
use App\Models\CodeExecution;
use App\Models\CodeSnippet;
use App\Models\ProgrammingLanguage;
use Illuminate\Support\Facades\Log;

class CodeExecutionService
{
    /**
     * Enqueue code for execution in an isolated worker.
     *
     * Creates a pending CodeExecution record and dispatches
     * the ExecuteCodeJob to be processed by the queue worker
     * with CPU/memory limits, restricted filesystem, and
     * network controls.
     */
    public function executeCode(
        string $code,
        ProgrammingLanguage $language,
        ?string $input = null,
        ?int $userId = null,
        ?int $snippetId = null
    ): CodeExecution {
        // Validate language is active
        if (!$language->isAvailable()) {
            return CodeExecution::create([
                'user_id' => $userId,
                'language_id' => $language->id,
                'snippet_id' => $snippetId,
                'code' => $code,
                'input_data' => $input,
                'error_message' => "Language {$language->name} is not available",
                'status' => 'error',
            ]);
        }

        // Create a pending execution record
        $execution = CodeExecution::create([
            'user_id' => $userId,
            'language_id' => $language->id,
            'snippet_id' => $snippetId,
            'code' => $code,
            'input_data' => $input,
            'status' => 'pending',
        ]);

        // Dispatch to queue for isolated execution
        ExecuteCodeJob::dispatch($execution->id)
            ->onQueue('code-execution');

        Log::info("Code execution #{$execution->id} queued for {$language->name}", [
            'user_id' => $userId,
            'language' => $language->slug,
        ]);

        return $execution;
    }

    /**
     * Get supported languages
     */
    public function getSupportedLanguages(): array
    {
        return ProgrammingLanguage::where('is_active', true)
            ->orderBy('name')
            ->get()
            ->toArray();
    }

    /**
     * Validate code syntax (basic validation — runs inline, no execution)
     */
    public function validateSyntax(string $code, string $languageSlug): array
    {
        return match($languageSlug) {
            'python' => $this->validatePythonSyntax($code),
            'javascript', 'javascript-node' => $this->validateJavaScriptSyntax($code),
            'php' => $this->validatePHPSyntax($code),
            default => ['valid' => true, 'errors' => []],
        };
    }

    private function validatePythonSyntax(string $code): array
    {
        $process = new \Symfony\Component\Process\Process(['python', '-m', 'py_compile', '-']);
        $process->setInput($code);
        $process->setTimeout(5);

        try {
            $process->run();
            return [
                'valid' => $process->getExitCode() === 0,
                'errors' => $process->getErrorOutput() ? [$process->getErrorOutput()] : [],
            ];
        } catch (\Exception $e) {
            return ['valid' => false, 'errors' => [$e->getMessage()]];
        }
    }

    private function validateJavaScriptSyntax(string $code): array
    {
        $process = new \Symfony\Component\Process\Process(['node', '--check', '-e', $code]);
        $process->setTimeout(5);

        try {
            $process->run();
            return [
                'valid' => $process->getExitCode() === 0,
                'errors' => $process->getErrorOutput() ? [$process->getErrorOutput()] : [],
            ];
        } catch (\Exception $e) {
            return ['valid' => false, 'errors' => [$e->getMessage()]];
        }
    }

    private function validatePHPSyntax(string $code): array
    {
        $process = new \Symfony\Component\Process\Process(['php', '-l', '-']);
        $process->setInput($code);
        $process->setTimeout(5);

        try {
            $process->run();
            return [
                'valid' => $process->getExitCode() === 0,
                'errors' => $process->getErrorOutput() ? [$process->getErrorOutput()] : [],
            ];
        } catch (\Exception $e) {
            return ['valid' => false, 'errors' => [$e->getMessage()]];
        }
    }
}
