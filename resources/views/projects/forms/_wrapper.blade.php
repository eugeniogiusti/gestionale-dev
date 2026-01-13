@props(['project' => null, 'action', 'method' => 'POST'])

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
    <form method="POST" action="{{ $action }}" 
          x-data="projectForm"
          data-errors="{{ json_encode($errors->messages()) }}">
        
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif

        {{-- Hidden input for intelligent redirect (only edit) --}}
        @if(isset($project) && request('back') === 'show')
            <input type="hidden" name="back" value="show">
        @endif

        {{-- Tab Navigation --}}
        @include('projects.forms._tabs-nav')

        {{-- Tab Content --}}
            <div class="p-6">
            @include('projects.forms.tabs._info', ['project' => $project])
            @include('projects.forms.tabs._links', ['project' => $project])
            @include('projects.forms.tabs._notes', ['project' => $project])
        </div>

        {{-- Form Actions --}}
        @include('projects.forms._actions')
    </form>
</div>