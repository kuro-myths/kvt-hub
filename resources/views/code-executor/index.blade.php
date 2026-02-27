@extends('tata-letak.utama')

@section('title', 'Code Executor - Learn & Execute Code Online')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-4">
                <i class="fas fa-code mr-3"></i>Code Executor
            </h1>
            <p class="text-xl text-gray-300">Learn, write, execute & analyze code across multiple languages</p>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100">Languages</p>
                        <p class="text-3xl font-bold">{{ count($languages) }}</p>
                    </div>
                    <i class="fas fa-globe text-4xl opacity-20"></i>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100">My Snippets</p>
                        <p class="text-3xl font-bold">{{ $userSnippets->count() }}</p>
                    </div>
                    <i class="fas fa-bookmark text-4xl opacity-20"></i>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100">Executions</p>
                        <p class="text-3xl font-bold">{{ CodeExecution::where('user_id', auth()->id())->count() }}</p>
                    </div>
                    <i class="fas fa-play text-4xl opacity-20"></i>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100">Learning Paths</p>
                        <p class="text-3xl font-bold">{{ LearningPath::where('is_published', true)->count() }}</p>
                    </div>
                    <i class="fas fa-graduation-cap text-4xl opacity-20"></i>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Sidebar -->
            <div class="lg:col-span-1">
                <!-- Supported Languages -->
                <div class="bg-slate-800 rounded-xl p-6 mb-6 border border-slate-700">
                    <h2 class="text-xl font-bold text-white mb-4">
                        <i class="fas fa-code mr-2"></i>Supported Languages
                    </h2>
                    <div class="space-y-2">
                        @foreach($languages as $lang)
                            <a href="{{ route('code-executor.editor', $lang->slug) }}"
                               class="block p-3 rounded-lg bg-slate-700 hover:bg-slate-600 transition text-gray-300 hover:text-white">
                                <i class="fas fa-{{ $lang->icon }} mr-2"></i>{{ $lang->name }} v{{ $lang->version }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <h2 class="text-xl font-bold text-white mb-4">
                        <i class="fas fa-flash mr-2"></i>Quick Actions
                    </h2>
                    <div class="space-y-2">
                        <a href="{{ route('code-executor.my-snippets') }}"
                           class="block p-3 rounded-lg bg-blue-500 hover:bg-blue-600 transition text-white text-center">
                            <i class="fas fa-bookmark mr-2"></i>My Snippets
                        </a>
                        <a href="{{ route('code-executor.history') }}"
                           class="block p-3 rounded-lg bg-purple-500 hover:bg-purple-600 transition text-white text-center">
                            <i class="fas fa-history mr-2"></i>Execution History
                        </a>
                        <a href="{{ route('code-executor.learning-paths') }}"
                           class="block p-3 rounded-lg bg-green-500 hover:bg-green-600 transition text-white text-center">
                            <i class="fas fa-graduation-cap mr-2"></i>Learning Paths
                        </a>
                        <a href="{{ route('code-executor.explore') }}"
                           class="block p-3 rounded-lg bg-orange-500 hover:bg-orange-600 transition text-white text-center">
                            <i class="fas fa-search mr-2"></i>Explore Snippets
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Recent Snippets -->
                @if($userSnippets->count() > 0)
                    <div class="bg-slate-800 rounded-xl p-6 mb-6 border border-slate-700">
                        <h2 class="text-xl font-bold text-white mb-4">
                            <i class="fas fa-history mr-2"></i>Recent Snippets
                        </h2>
                        <div class="space-y-3">
                            @foreach($userSnippets as $snippet)
                                <div class="bg-slate-700 p-4 rounded-lg hover:bg-slate-600 transition">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <a href="#" class="text-lg font-semibold text-blue-400 hover:text-blue-300">
                                                {{ $snippet->title }}
                                            </a>
                                            <p class="text-sm text-gray-400">
                                                <span class="text-purple-400">{{ $snippet->language->name }}</span>
                                                • {{ $snippet->difficulty_level }}
                                                • <i class="fas fa-eye mr-1"></i>{{ $snippet->views_count }}
                                            </p>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold"
                                              style="background-color: {{ $snippet->getDifficultyColor() }}33; color: {{ $snippet->getDifficultyColor() }}">
                                            {{ ucfirst($snippet->difficulty_level) }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Recent Executions -->
                @if($recentExecutions->count() > 0)
                    <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                        <h2 class="text-xl font-bold text-white mb-4">
                            <i class="fas fa-play mr-2"></i>Recent Executions
                        </h2>
                        <div class="space-y-3">
                            @foreach($recentExecutions as $exec)
                                <div class="bg-slate-700 p-4 rounded-lg">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm text-gray-400">{{ $exec->language->name }}</p>
                                            <p class="text-sm text-gray-300">{{ Str::limit($exec->code, 60) }}</p>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold"
                                              style="background-color: {{ $exec->getStatusColor() }}33; color: {{ $exec->getStatusColor() }}">
                                            {{ ucfirst($exec->status) }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">{{ $exec->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="bg-slate-800 py-12 mt-12 border-t border-slate-700">
    <div class="container mx-auto px-4 max-w-7xl">
        <h2 class="text-3xl font-bold text-white text-center mb-12">
            <i class="fas fa-star mr-2 text-yellow-400"></i>Powerful Features
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-slate-700 p-6 rounded-xl">
                <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-play text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Execute Code</h3>
                <p class="text-gray-400">Run code in 6+ languages with real-time output and error handling</p>
            </div>

            <div class="bg-slate-700 p-6 rounded-xl">
                <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-robot text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">AI Analysis</h3>
                <p class="text-gray-400">Get AI-powered code analysis, optimization suggestions, and debugging</p>
            </div>

            <div class="bg-slate-700 p-6 rounded-xl">
                <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-graduation-cap text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Learn Paths</h3>
                <p class="text-gray-400">AI-generated learning paths with modules, quizzes, and challenges</p>
            </div>

            <div class="bg-slate-700 p-6 rounded-xl">
                <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-share text-white text-lg"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Share & Explore</h3>
                <p class="text-gray-400">Share snippets publicly and explore code from other developers</p>
            </div>
        </div>
    </div>
</div>

@endsection
