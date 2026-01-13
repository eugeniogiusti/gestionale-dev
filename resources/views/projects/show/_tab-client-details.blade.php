@if($project->client)

  {{-- Header Cliente --}}
  <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 rounded-lg p-6 border border-indigo-200 dark:border-indigo-800">
    <div class="flex items-center gap-3 mb-4">
      <span class="text-3xl">👤</span>
      <div>
        <h3 class="text-xl font-bold text-gray-900 dark:text-white">
          {{ $project->client->name }}
        </h3>
        @if($project->client->company)
          <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ $project->client->company }}
          </p>
        @endif
      </div>
    </div>

    <div class="flex gap-2 mt-4">
      <a href="{{ route('clients.show', $project->client) }}"
         class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
        <span>👁️</span> {{ __('clients.view_profile') }}
      </a>

      @if($project->client->email)
        <a href="mailto:{{ $project->client->email }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
          <span>📧</span> {{ __('clients.send_email') }}
        </a>
      @endif
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

    {{-- Contatti --}}
    <x-ui.section-card :title="__('clients.contact_info')" icon="📞">
      <div class="space-y-3">
        @if($project->client->email)
          <x-ui.info-row icon="📧" label="Email">
            <a href="mailto:{{ $project->client->email }}"
               class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline break-all">
              {{ $project->client->email }}
            </a>
          </x-ui.info-row>
        @endif

        @if($project->client->phone)
          <x-ui.info-row icon="📱" :label="__('clients.phone')">
            <a href="tel:{{ $project->client->phone_prefix }}{{ $project->client->phone }}"
               class="text-sm font-medium hover:text-blue-600 dark:hover:text-blue-400">
              {{ $project->client->phone_prefix }} {{ $project->client->phone }}
            </a>
          </x-ui.info-row>
        @endif

        @if($project->client->address)
          <x-ui.info-row icon="📍" :label="__('clients.address')">
            {{ $project->client->address }}
          </x-ui.info-row>
        @endif

        @if(!$project->client->email && !$project->client->phone && !$project->client->address)
          <p class="text-sm text-gray-500 dark:text-gray-400 italic">
            {{ __('clients.no_contact_info') }}
          </p>
        @endif
      </div>
    </x-ui.section-card>

    {{-- Billing --}}
    <x-ui.section-card :title="__('clients.billing_info')" icon="🧾">
      <div class="space-y-3">
        @if($project->client->vat_number)
          <x-ui.info-row icon="🏢" :label="__('clients.vat_number')">
            <span class="font-mono font-medium">{{ $project->client->vat_number }}</span>
          </x-ui.info-row>
        @endif

        @if($project->client->fiscal_code)
          <x-ui.info-row icon="🆔" :label="__('clients.fiscal_code')">
            <span class="font-mono font-medium">{{ $project->client->fiscal_code }}</span>
          </x-ui.info-row>
        @endif

        @if($project->client->sdi_code)
          <x-ui.info-row icon="💼" :label="__('clients.sdi_code')">
            <span class="font-mono font-medium">{{ $project->client->sdi_code }}</span>
          </x-ui.info-row>
        @endif

        @if($project->client->pec)
          <x-ui.info-row icon="📨" label="PEC">
            <a href="mailto:{{ $project->client->pec }}"
               class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline break-all">
              {{ $project->client->pec }}
            </a>
          </x-ui.info-row>
        @endif

        @if(!$project->client->vat_number && !$project->client->fiscal_code && !$project->client->sdi_code && !$project->client->pec)
          <p class="text-sm text-gray-500 dark:text-gray-400 italic">
            {{ __('clients.no_billing_info') }}
          </p>
        @endif
      </div>
    </x-ui.section-card>

  </div>

  {{-- Web & Social --}}
  <div class="mt-6">
    <x-ui.section-card :title="__('clients.web_social')" icon="🌐">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        @if($project->client->website)
          <x-ui.link-tile
            :href="$project->client->website"
            icon="🌐"
            label="Website"
            :value="parse_url($project->client->website, PHP_URL_HOST) ?: $project->client->website"
          />
        @endif

        @if($project->client->linkedin)
          <x-ui.link-tile
            :href="$project->client->linkedin"
            icon="💼"
            label="LinkedIn"
            :value="__('clients.view_profile')"
          />
        @endif

      </div>

      @if(!$project->client->website && !$project->client->linkedin)
        <p class="text-sm text-gray-500 dark:text-gray-400 italic mt-2">
          {{ __('clients.no_web_social') }}
        </p>
      @endif
    </x-ui.section-card>
  </div>

@else
  {{-- Progetto interno --}}
  <div class="flex items-center justify-center py-16">
    <div class="text-center max-w-md">
      <span class="text-6xl mb-4 block">💼</span>
      <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
        {{ __('projects.internal_project') }}
      </h3>
      <p class="text-gray-600 dark:text-gray-400">
        {{ __('projects.internal_project_desc') }}
      </p>
    </div>
  </div>
@endif