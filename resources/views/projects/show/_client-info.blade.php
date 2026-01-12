<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-3">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('projects.client') }}
        </h3>
    </div>
    
    @if($project->client)
        <div class="space-y-3">
            {{-- Nome Cliente --}}
            <p class="font-medium text-gray-900 dark:text-white">
                {{ $project->client->name }}
            </p>
            
            {{-- P.IVA --}}
            <x-vat-display :vat="$project->client->vat_number" />
            
            {{-- Email con icona --}}
            <x-email-link :email="$project->client->email" />
            
            {{-- WhatsApp con icona --}}
            <x-whatsapp-link 
                :phone="$project->client->phone" 
                :prefix="$project->client->phone_prefix" 
            />
        </div>
    @else
        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300">
            🏢 {{ __('projects.internal_project') }}
        </span>
    @endif
</div>