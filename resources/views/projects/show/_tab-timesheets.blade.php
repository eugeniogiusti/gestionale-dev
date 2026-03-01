@php
    $tsMonth         = $showData['tsMonth'];
    $tsYear          = $showData['tsYear'];
    $currentTs       = $showData['currentTimesheet'];
    $timesheetMonths = $showData['timesheetMonths'];
    $existingHours   = $showData['existingHours'];
    $weeks           = $showData['weeks'];
    $hourlyRate      = $showData['hourlyRate'];
    $totalHours      = $showData['totalHours'];
    $totalEarnings   = $showData['totalEarnings'];
    $monthNames      = $showData['monthNames'];
@endphp

<div class="space-y-6">

    {{-- Navigazione mese --}}
    @include('timesheets.partials._nav')

    {{-- Avviso tariffa non impostata --}}
    @if(! $project->hourly_rate && $project->type === 'client_work')
        @include('timesheets.partials._no-rate-warning')
    @endif

    {{-- Form mensile: griglia + note + riepilogo --}}
    @include('timesheets.partials._form')

    {{-- Storico mesi salvati --}}
    @if($timesheetMonths->count() > 0)
        @include('timesheets.partials._history')
    @endif

</div>
