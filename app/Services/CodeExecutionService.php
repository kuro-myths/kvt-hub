<?php

namespace App\Services;

use App\Models\CodeExecution;
use App\Models\CodeSnippet;
use App\Models\ProgrammingLanguage;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessTimedOutException;

class CodeExecutionService
{
    /**
     * Execute code in specified language
     * 
     * @param string $code
     * @param ProgrammingLanguage $language
     * @param string|null $input
     * @param int|null $userId
     * @param int|null $snippetId
     * @return CodeExecution
     */
    public function executeCode(
        string $code,
        ProgrammingLanguage $language,
        ?string $input = null,
        ?int $userId = null,
        ?int $snippetId = null
    ): CodeExecution {
        $startTime = microtime(true);

        try {
            // Validate language is active
            if (!$language->isAvailable()) {
                throw new \Exception("Language {$language->name} is not available");
            }

            // Execute code based on language
            $result = match($language->slug) {
                'python' => $this->executePython($code, $input, $language),
                'javascript' => $this->executeJavaScript($code, $input, $language),
                'php' => $this->executePHP($code, $input, $language),
                'javascript-node' => $this->executeNodeJS($code, $input, $language),
                'bash' => $this->executeBash($code, $input, $language),
                'sql' => $this->executeSQL($code, $input, $language),
                default => throw new \Exception("Unsupported language: {$language->name}"),
            };

            $executionTime = (microtime(true) - $startTime) * 1000; // ms

            // Log execution
            Log::info("Code executed for {$language->name}", [
                'user_id' => $userId,
                'language' => $language->slug,
                'status' => $result['status'],
                'time_ms' => $executionTime,
            ]);

            // Save execution record
            return CodeExecution::create([
                'user_id' => $userId,
                'language_id' => $language->id,
                'snippet_id' => $snippetId,
                'code' => $code,
                'input_data' => $input,
                'output_data' => $result['output'] ?? null,
                'error_message' => $result['error'] ?? null,
                'execution_time_ms' => $executionTime,
                'memory_usage_mb' => $result['memory'] ?? null,
                'status' => $result['status'],
            ]);

        } catch (ProcessTimedOutException $e) {
            Log::warning("Code execution timeout for {$language->name}");

            return CodeExecution::create([
                'user_id' => $userId,
                'language_id' => $language->id,
                'snippet_id' => $snippetId,
                'code' => $code,
                'input_data' => $input,
                'error_message' => "Execution timeout ({$language->timeout_seconds}s limit)",
                'status' => 'timeout',
            ]);

        } catch (\Exception $e) {
            Log::error("Code execution error: " . $e->getMessage());

            return CodeExecution::create([
                'user_id' => $userId,
                'language_id' => $language->id,
                'snippet_id' => $snippetId,
                'code' => $code,
                'input_data' => $input,
                'error_message' => $e->getMessage(),
                'status' => 'error',
            ]);
        }
    }

    /**
     * Execute Python code
     */
    private function executePython(string $code, ?string $input, ProgrammingLanguage $language): array
    {
        $process = new Process(['python', '-c', $code]);
        $process->setTimeout($language->timeout_seconds);
        $process->setInput($input);

        try {
            $process->mustRun();
            return [
                'status' => 'success',
                'output' => $process->getOutput(),
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'error' => $process->getErrorOutput() ?: $e->getMessage(),
            ];
        }
    }

    /**
     * Execute JavaScript (Browser/Node.js simulation)
     */
    private function executeJavaScript(string $code, ?string $input, ProgrammingLanguage $language): array
    {
        // Simple JavaScript sandbox - could be improved with actual JS runtime
        $process = new Process(['node', '-e', $code]);
        $process->setTimeout($language->timeout_seconds);
        $process->setInput($input);

        try {
            $process->mustRun();
            return [
                'status' => 'success',
                'output' => $process->getOutput(),
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'error' => $process->getErrorOutput() ?: $e->getMessage(),
            ];
        }
    }

    /**
     * Execute PHP code
     */
    private function executePHP(string $code, ?string $input, ProgrammingLanguage $language): array
    {
        $process = new Process(['php', '-r', $code]);
        $process->setTimeout($language->timeout_seconds);
        $process->setInput($input);

        try {
            $process->mustRun();
            return [
                'status' => 'success',
                'output' => $process->getOutput(),
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'error' => $process->getErrorOutput() ?: $e->getMessage(),
            ];
        }
    }

    /**
     * Execute Node.js code
     */
    private function executeNodeJS(string $code, ?string $input, ProgrammingLanguage $language): array
    {
        return $this->executeJavaScript($code, $input, $language);
    }

    /**
     * Execute Bash script
     */
    private function executeBash(string $code, ?string $input, ProgrammingLanguage $language): array
    {
        $process = new Process(['bash', '-c', $code]);
        $process->setTimeout($language->timeout_seconds);
        $process->setInput($input);

        try {
            $process->mustRun();
            return [
                'status' => 'success',
                'output' => $process->getOutput(),
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'error' => $process->getErrorOutput() ?: $e->getMessage(),
            ];
        }
    }

    /**
     * Execute SQL query (simulated - would need actual DB connection)
     */
    private function executeSQL(string $code, ?string $input, ProgrammingLanguage $language): array
    {
        // This would require actual database connection and credentials
        // For safety, we'll simulate this for SELECT statements only
        
        if (!preg_match('/^\\s*SELECT/i', $code)) {
            return [
                'status' => 'error',
                'error' => 'Only SELECT statements are allowed for safety',
            ];
        }

        return [
            'status' => 'success',
            'output' => 'SQL execution simulated - use actual database for production',
        ];
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
     * Validate code syntax (basic validation)
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
        $process = new Process(['python', '-m', 'py_compile', '-']);
        $process->setInput($code);
        
        try {
            $process->run();
            return [
                'valid' => $process->getExitCode() === 0,
                'errors' => $process->getErrorOutput() ? [$process->getErrorOutput()] : [],
            ];
        } catch (\Exception $e) {
            return [
                'valid' => false,
                'errors' => [$e->getMessage()],
            ];
        }
    }

    private function validateJavaScriptSyntax(string $code): array
    {
        // Basic JavaScript syntax check using Node.js
        $process = new Process(['node', '--check', '-e', $code]);

        try {
            $process->run();
            return [
                'valid' => $process->getExitCode() === 0,
                'errors' => $process->getErrorOutput() ? [$process->getErrorOutput()] : [],
            ];
        } catch (\Exception $e) {
            return [
                'valid' => false,
                'errors' => [$e->getMessage()],
            ];
        }
    }

    private function validatePHPSyntax(string $code): array
    {
        $process = new Process(['php', '-l', '-']);
        $process->setInput($code);

        try {
            $process->run();
            return [
                'valid' => $process->getExitCode() === 0,
                'errors' => $process->getErrorOutput() ? [$process->getErrorOutput()] : [],
            ];
        } catch (\Exception $e) {
            return [
                'valid' => false,
                'errors' => [$e->getMessage()],
            ];
        }
    }
}
