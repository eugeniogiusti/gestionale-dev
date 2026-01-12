@props(['project' => null, 'action', 'method' => 'POST'])

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
    <form method="POST" action="{{ $action }}" 
          x-data="{ 
              activeTab: 'info',
              errors: {{ json_encode($errors->messages()) }},
              hasErrors(tab) {
                  const tabFields = {
                      'info': ['name', 'client_id', 'description', 'status', 'priority'],
                      'links': ['repo_url', 'staging_url', 'production_url', 'figma_url', 'docs_url'],
                      'notes': ['notes']
                  };
                  return tabFields[tab]?.some(field => this.errors[field]);
              }
          }">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif

        {{-- Campo hidden per redirect intelligente (solo edit) --}}
        @if(isset($project) && request('back') === 'show')
            <input type="hidden" name="back" value="show">
        @endif

        {{-- Tab Navigation --}}
        @include('projects.forms._tabs-nav')

        {{-- Tab Content --}}
        <div class="p-6">
            @include('projects.forms._fields', ['project' => $project])
        </div>

        {{-- Form Actions --}}
        @include('projects.forms._actions')
    </form>
</div>