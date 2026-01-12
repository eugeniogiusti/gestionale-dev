<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @include('projects.forms._header', ['title' => __('projects.edit_project')])

            @include('projects.forms._wrapper', [
                'project' => $project,
                'action' => route('projects.update', $project),
                'method' => 'PUT'
            ])

        </div>
    </div>
</x-app-layout>