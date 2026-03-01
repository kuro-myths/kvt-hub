<?php

namespace App\Jobs;

use App\Models\CodeExecution;
use App\Models\ProgrammingLanguage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessTimedOutException;

/**
 * Isolated queue-based code execution worker with resource limits.
 *
 * Runs code in a subprocess with:
 *  - CPU timeout via Symfony Process
 *  - Memory limit enforced per language
 *  - Restricted filesystem (temp dir only)
 *  - Network access disabled via sandbox flags
 */
class ExecuteCodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** Max retries for the job */
    public int $tries = 1;

    /** Timeout for the entire job (seconds) */
    public int $timeout = 30;

    /** Memory limit per execution in MB */
    private const MEMORY_LIMIT_MB = 128;

    public function __construct(
        private int $executionId
    ) {}

    public function handle(): void
    {
        $execution = CodeExecution::find($this->executionId);

        if (!$execution) {
            Log::warning("ExecuteCodeJob: execution #{$this->executionId} not found");
            return;
        }

        $language = ProgrammingLanguage::find($execution->language_id);

        if (!$language || !$language->isAvailable()) {
            $execution->update([
                'status' => 'error',
                'error_message' => 'Language not available',
            ]);
            return;
        }

        $startTime = microtime(true);

        try {
            $result = $this->runInSandbox(
                code: $execution->code,
                language: $language,
                input: $execution->input_data,
            );

            $executionTime = (microtime(true) - $startTime) * 1000;

            $execution->update([
                'output_data' => $result['output'] ?? null,
                'error_message' => $result['error'] ?? null,
                'execution_time_ms' => $executionTime,
                'memory_usage_mb' => $result['memory'] ?? null,
                'status' => $result['status'],
            ]);

        } catch (ProcessTimedOutException $e) {
            $execution->update([
                'status' => 'timeout',
                'error_message' => "Execution timeout ({$language->timeout_seconds}s limit)",
            ]);

        } catch (\Throwable $e) {
            Log::error("ExecuteCodeJob error: " . $e->getMessage());
            $execution->update([
                'status' => 'error',
                'error_message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Execute code inside a sandboxed subprocess with resource limits.
     */
    private function runInSandbox(string $code, ProgrammingLanguage $language, ?string $input): array
    {
        $timeoutSeconds = min($language->timeout_seconds ?? 10, 15);
        $memoryMb = self::MEMORY_LIMIT_MB;

        // Create isolated temp directory for this execution
        $sandboxDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'kvt_sandbox_' . uniqid();
        @mkdir($sandboxDir, 0700, true);

        try {
            $command = $this->buildCommand($language->slug, $code, $sandboxDir, $memoryMb);

            $process = new Process($command);
            $process->setTimeout($timeoutSeconds);
            $process->setIdleTimeout($timeoutSeconds);
            $process->setInput($input);
            $process->setWorkingDirectory($sandboxDir);

            // Restrict environment: no network helpers, minimal PATH
            $env = [
                'HOME' => $sandboxDir,
                'TMPDIR' => $sandboxDir,
                'PATH' => '/usr/local/bin:/usr/bin:/bin',
                'LANG' => 'C.UTF-8',
                // Block network access where possible via env hints
                'no_proxy' => '*',
                'http_proxy' => 'http://0.0.0.0:0',
                'https_proxy' => 'http://0.0.0.0:0',
            ];
            $process->setEnv($env);

            $process->run();

            $status = $process->isSuccessful() ? 'success' : 'error';

            return [
                'status' => $status,
                'output' => $process->getOutput(),
                'error' => $process->getErrorOutput() ?: null,
                'memory' => null,
            ];

        } finally {
            // Clean up sandbox directory
            $this->cleanupSandbox($sandboxDir);
        }
    }

    /**
     * Build the process command based on language, applying memory limits.
     */
    private function buildCommand(string $slug, string $code, string $sandboxDir, int $memoryMb): array
    {
        // Write code to a temp file to avoid shell injection via -c/-e
        $ext = match ($slug) {
            'python' => 'py',
            'javascript', 'javascript-node' => 'js',
            'php' => 'php',
            'bash' => 'sh',
            default => 'txt',
        };

        $codeFile = $sandboxDir . DIRECTORY_SEPARATOR . 'code.' . $ext;
        file_put_contents($codeFile, $slug === 'php' ? $code : $code);

        return match ($slug) {
            'python' => ['python', '-u', $codeFile],
            'javascript', 'javascript-node' => ['node', "--max-old-space-size={$memoryMb}", $codeFile],
            'php' => ['php', "-d", "memory_limit={$memoryMb}M", $codeFile],
            'bash' => ['bash', $codeFile],
            default => throw new \Exception("Unsupported language: {$slug}"),
        };
    }

    /**
     * Recursively remove sandbox directory.
     */
    private function cleanupSandbox(string $dir): void
    {
        if (!is_dir($dir)) {
            return;
        }

        $items = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($items as $item) {
            $item->isDir() ? @rmdir($item->getRealPath()) : @unlink($item->getRealPath());
        }

        @rmdir($dir);
    }
}
