<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @include('projects.forms._header', ['title' => __('projects.create_project')])

            @include('projects.forms._wrapper', [
                'action' => route('projects.store'),
                'method' => 'POST'
            ])

        </div>
    </div>
</x-app-layout>