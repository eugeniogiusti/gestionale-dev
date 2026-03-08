{{-- Recent Commits List --}}
<div x-show="commits.length > 0"
     class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">

    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200 dark:border-gray-700">
        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300">
            {{ __('projects.recent_commits') }}
        </h4>
        <a :href="info.html_url ? info.html_url + '/commits' : '{{ $project->repo_url }}'"
           target="_blank" rel="noopener noreferrer"
           class="text-sm text-emerald-600 hover:text-emerald-700 dark:text-emerald-400">
            {{ __('ui.view_all') }}
        </a>
    </div>

    <ul class="divide-y divide-gray-100 dark:divide-gray-700">
        <template x-for="(commit, i) in commits" :key="i">
            <li class="flex items-start gap-3 px-5 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/40">

                {{-- Author avatar --}}
                <template x-if="commit.avatar">
                    <img :src="commit.avatar"
                         :alt="commit.author"
                         class="w-7 h-7 rounded-full flex-shrink-0 mt-0.5 border border-gray-200 dark:border-gray-600">
                </template>
                <template x-if="!commit.avatar">
                    <div class="w-7 h-7 rounded-full flex-shrink-0 mt-0.5 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                        </svg>
                    </div>
                </template>

                {{-- Commit message + meta --}}
                <div class="flex-1 min-w-0">
                    <a :href="commit.url" target="_blank" rel="noopener noreferrer"
                       class="text-sm font-medium text-gray-800 dark:text-gray-200 hover:text-emerald-600 dark:hover:text-emerald-400 line-clamp-1 block"
                       x-text="commit.message">
                    </a>
                    <div class="flex items-center gap-2 mt-0.5">
                        <span class="text-xs text-gray-500 dark:text-gray-400" x-text="commit.author"></span>
                        <span class="text-gray-300 dark:text-gray-600">·</span>
                        <span class="text-xs text-gray-400 dark:text-gray-500" x-text="formatDate(commit.date)"></span>
                    </div>
                </div>

                {{-- SHA badge --}}
                <a :href="commit.url" target="_blank" rel="noopener noreferrer"
                   class="flex-shrink-0 font-mono text-xs bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 px-2 py-0.5 rounded hover:bg-emerald-50 dark:hover:bg-emerald-900/30 hover:text-emerald-600 dark:hover:text-emerald-400 transition"
                   x-text="commit.sha">
                </a>
            </li>
        </template>
    </ul>
</div>
