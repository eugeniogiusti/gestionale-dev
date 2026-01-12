{{-- Projects Section --}}
<template x-if="results.projects.length > 0">
    <div class="p-2">
        <template x-for="project in results.projects" :key="project.id">
            <a :href="`/projects/${project.id}`"
               @click.prevent="navigateToProject(project.id)"
               class="block px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition cursor-pointer">
                <div class="font-medium text-gray-900 dark:text-white text-sm" x-text="project.name"></div>
                <template x-if="project.client">
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        <span x-text="project.client.name"></span>
                        <template x-if="project.client.vat_number">
                            <span> · <span x-text="project.client.vat_number"></span></span>
                        </template>
                    </div>
                </template>
                <template x-if="!project.client">
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        {{ __('navbar.internal_project') }}
                    </div>
                </template>
            </a>
        </template>
    </div>
</template>

{{-- Empty State --}}
<template x-if="isEmpty">
    <div class="p-6 text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            {{ __('navbar.no_projects_found') }}
        </p>
    </div>
</template>