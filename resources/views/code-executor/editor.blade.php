@extends('tata-letak.utama')

@section('title', $language->name . ' Code Editor')

@section('content')
<div class="h-screen bg-slate-900 flex flex-col">
    <!-- Header -->
    <div class="bg-slate-800 border-b border-slate-700 px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('code-executor.index') }}" class="text-gray-400 hover:text-white">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <div>
                <h1 class="text-xl font-bold text-white">
                    <i class="fas fa-code mr-2"></i>{{ $language->name }} v{{ $language->version }}
                </h1>
                <p class="text-sm text-gray-400">Online Code Editor & Executor</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button @click="validateCode()" 
                    class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition">
                <i class="fas fa-check mr-2"></i>Validate
            </button>
            <button @click="analyzeCode()" 
                    class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition">
                <i class="fas fa-robot mr-2"></i>Analyze
            </button>
            <button @click="executeCode()" 
                    class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition">
                <i class="fas fa-play mr-2"></i>Run
            </button>
        </div>
    </div>

    <!-- Main Editor Area -->
    <div class="flex-1 flex overflow-hidden">
        <!-- Editor Panel -->
        <div class="flex-1 flex flex-col bg-slate-900">
            <!-- Code Input -->
            <div class="flex-1 flex flex-col">
                <div class="px-4 py-2 bg-slate-800 border-b border-slate-700">
                    <p class="text-sm text-gray-400">
                        <i class="fas fa-code mr-2"></i>Code Editor
                    </p>
                </div>
                <textarea id="codeInput"
                          class="flex-1 bg-slate-800 text-gray-100 font-mono p-4 resize-none focus:outline-none border-0"
                          placeholder="Write your code here...&#10;// Example for {{ $language->name }}"
                          spellcheck="false">@if($language->example_code){{ $language->example_code }}@endif</textarea>
            </div>

            <!-- Input Panel -->
            <div class="border-t border-slate-700 bg-slate-800">
                <div class="flex items-center justify-between px-4 py-2">
                    <p class="text-sm text-gray-400">
                        <i class="fas fa-arrow-right mr-2"></i>Input (stdin)
                    </p>
                    <button @click="clearInput()" class="text-xs text-gray-500 hover:text-gray-400">Clear</button>
                </div>
                <textarea id="inputData"
                          class="w-full h-20 bg-slate-700 text-gray-100 font-mono p-4 resize-none focus:outline-none border-0"
                          placeholder="Input data for your code (optional)"></textarea>
            </div>
        </div>

        <!-- Output Panel -->
        <div class="w-1/3 border-l border-slate-700 flex flex-col bg-slate-800">
            <!-- Tabs -->
            <div class="flex border-b border-slate-700">
                <button @click="activeTab = 'output'" 
                        :class="activeTab === 'output' ? 'border-b-2 border-green-500 text-white' : 'text-gray-400'"
                        class="flex-1 px-4 py-2 text-sm font-medium transition">
                    <i class="fas fa-play mr-2"></i>Output
                </button>
                <button @click="activeTab = 'analysis'" 
                        :class="activeTab === 'analysis' ? 'border-b-2 border-purple-500 text-white' : 'text-gray-400'"
                        class="flex-1 px-4 py-2 text-sm font-medium transition">
                    <i class="fas fa-chart-line mr-2"></i>Analysis
                </button>
                <button @click="activeTab = 'help'" 
                        :class="activeTab === 'help' ? 'border-b-2 border-blue-500 text-white' : 'text-gray-400'"
                        class="flex-1 px-4 py-2 text-sm font-medium transition">
                    <i class="fas fa-question-circle mr-2"></i>Help
                </button>
            </div>

            <!-- Output Tab -->
            <div v-show="activeTab === 'output'" class="flex-1 overflow-auto p-4">
                <div v-if="!executionResult" class="text-gray-500 text-sm">
                    <p>Click "Run" to execute your code...</p>
                </div>

                <div v-else>
                    <div v-if="executionResult.status === 'success'" class="space-y-4">
                        <div class="bg-green-500 bg-opacity-10 border border-green-500 rounded-lg p-3">
                            <p class="text-green-400 font-semibold">
                                <i class="fas fa-check-circle mr-2"></i>Success
                            </p>
                            <p class="text-xs text-gray-400 mt-1">
                                Execution time: <span class="text-green-400">{{ executionResult.time_ms }}ms</span>
                            </p>
                        </div>

                        <div class="bg-slate-700 rounded-lg p-3">
                            <p class="text-xs text-gray-400 mb-2">Output:</p>
                            <pre class="text-gray-100 text-sm font-mono overflow-auto max-h-64">{{ executionResult.output || '(no output)' }}</pre>
                        </div>
                    </div>

                    <div v-else-if="executionResult.status === 'error'" class="space-y-4">
                        <div class="bg-red-500 bg-opacity-10 border border-red-500 rounded-lg p-3">
                            <p class="text-red-400 font-semibold">
                                <i class="fas fa-exclamation-circle mr-2"></i>Error
                            </p>
                        </div>

                        <div class="bg-slate-700 rounded-lg p-3">
                            <p class="text-xs text-gray-400 mb-2">Error Message:</p>
                            <pre class="text-red-400 text-sm font-mono overflow-auto max-h-64">{{ executionResult.error || 'Unknown error' }}</pre>
                        </div>

                        <button @click="askDebugHelp()" 
                                class="w-full px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm transition">
                            <i class="fas fa-magic mr-2"></i>Get Debug Help (AI)
                        </button>
                    </div>

                    <div v-else-if="executionResult.status === 'timeout'" class="space-y-4">
                        <div class="bg-orange-500 bg-opacity-10 border border-orange-500 rounded-lg p-3">
                            <p class="text-orange-400 font-semibold">
                                <i class="fas fa-clock mr-2"></i>Timeout
                            </p>
                            <p class="text-xs text-gray-400 mt-1">Code exceeded {{ language.timeout_seconds }}s execution limit</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analysis Tab -->
            <div v-show="activeTab === 'analysis'" class="flex-1 overflow-auto p-4">
                <div v-if="!analysis" class="text-gray-500 text-sm">
                    <p>Click "Analyze" to get AI code analysis...</p>
                </div>

                <div v-else class="space-y-4">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-slate-700 rounded-lg p-3">
                            <p class="text-xs text-gray-400">Quality</p>
                            <p class="text-2xl font-bold text-blue-400">{{ analysis.quality_score }}%</p>
                        </div>
                        <div class="bg-slate-700 rounded-lg p-3">
                            <p class="text-xs text-gray-400">Readability</p>
                            <p class="text-2xl font-bold text-green-400">{{ analysis.readability_score }}%</p>
                        </div>
                        <div class="bg-slate-700 rounded-lg p-3">
                            <p class="text-xs text-gray-400">Performance</p>
                            <p class="text-2xl font-bold text-yellow-400">{{ analysis.performance_score }}%</p>
                        </div>
                        <div class="bg-slate-700 rounded-lg p-3">
                            <p class="text-xs text-gray-400">Security</p>
                            <p class="text-2xl font-bold text-red-400">{{ analysis.security_score }}%</p>
                        </div>
                    </div>

                    <div class="bg-slate-700 rounded-lg p-3">
                        <p class="text-xs text-gray-400 mb-2">Grade: <span class="font-bold" :style="{color: getGradeColor(analysis.overall_grade)}">{{ analysis.overall_grade }}</span></p>
                    </div>

                    <div v-if="analysis.issues && analysis.issues.length > 0" class="bg-red-500 bg-opacity-10 border border-red-500 rounded-lg p-3">
                        <p class="text-red-400 text-xs font-semibold mb-2">Issues Found:</p>
                        <ul class="space-y-1">
                            <li v-for="issue in analysis.issues" :key="issue" class="text-red-300 text-xs">• {{ issue }}</li>
                        </ul>
                    </div>

                    <div v-if="analysis.suggestions && analysis.suggestions.length > 0" class="bg-blue-500 bg-opacity-10 border border-blue-500 rounded-lg p-3">
                        <p class="text-blue-400 text-xs font-semibold mb-2">Suggestions:</p>
                        <ul class="space-y-1">
                            <li v-for="sugg in analysis.suggestions" :key="sugg" class="text-blue-300 text-xs">• {{ sugg }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Help Tab -->
            <div v-show="activeTab === 'help'" class="flex-1 overflow-auto p-4 space-y-4">
                <div class="bg-slate-700 rounded-lg p-3">
                    <p class="text-sm font-semibold text-white mb-2">Quick Tips</p>
                    <ul class="text-xs text-gray-400 space-y-1">
                        <li>• Use Ctrl+Enter to execute code</li>
                        <li>• Click "Validate" to check syntax</li>
                        <li>• Click "Analyze" for AI code review</li>
                        <li>• Provide input data in the Input panel</li>
                        <li>• All executions are saved to history</li>
                    </ul>
                </div>

                <div class="bg-slate-700 rounded-lg p-3">
                    <p class="text-sm font-semibold text-white mb-2">{{ $language->name }} Info</p>
                    <p class="text-xs text-gray-400 mb-2">{{ $language->description }}</p>
                    <p class="text-xs text-gray-500">Version: {{ $language->version }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vue.js for Interactivity -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('codeEditor', () => ({
        language: @json($language),
        activeTab: 'output',
        executionResult: null,
        analysis: null,

        async executeCode() {
            const code = document.getElementById('codeInput').value;
            const input = document.getElementById('inputData').value;

            try {
                const response = await fetch('{{ route("code-executor.execute") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        code: code,
                        language_id: this.language.id,
                        input: input || null,
                    }),
                });

                const data = await response.json();
                this.executionResult = data;
                this.activeTab = 'output';
            } catch (error) {
                console.error('Execution error:', error);
                alert('Failed to execute code');
            }
        },

        async validateCode() {
            const code = document.getElementById('codeInput').value;

            try {
                const response = await fetch('{{ route("code-executor.validate") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        code: code,
                        language: this.language.slug,
                    }),
                });

                const data = await response.json();
                if (data.valid) {
                    alert('✓ Syntax is valid!');
                } else {
                    alert('✗ Syntax errors:\n' + data.errors.join('\n'));
                }
            } catch (error) {
                console.error('Validation error:', error);
            }
        },

        async analyzeCode() {
            alert('Code analysis feature coming soon!');
        },

        async askDebugHelp() {
            alert('Debug help feature coming soon!');
        },

        clearInput() {
            document.getElementById('inputData').value = '';
        },

        getGradeColor(grade) {
            const colors = {
                'A': '#4ade80',
                'B': '#60a5fa',
                'C': '#fbbf24',
                'D': '#f97316',
                'F': '#ef4444',
            };
            return colors[grade] || '#9ca3af';
        },
    }));
});
</script>

<script>
// Keyboard shortcuts
document.addEventListener('keydown', (e) => {
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
        document.querySelector('button:nth-of-type(3)').click(); // Run button
    }
});
</script>

@endsection
