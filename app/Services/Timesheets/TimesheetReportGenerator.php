<?php

namespace App\Services\Timesheets;

use App\Models\BusinessSettings;
use App\Models\Project;
use App\Models\Timesheet;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TimesheetReportGenerator
{
    public function download(Project $project, Timesheet $timesheet): StreamedResponse
    {
        $project->loadMissing('client');

        $business   = BusinessSettings::current();
        $monthNames = $this->monthNames();
        $dayNames   = $this->dayNames();

        $workedDays = collect($timesheet->daily_hours ?? [])
            ->filter(fn ($h) => (float) $h > 0)
            ->map(fn ($h, $day) => [
                'day'      => (int) $day,
                'day_name' => $dayNames[Carbon::create($timesheet->year, $timesheet->month, (int) $day)->dayOfWeekIso],
                'hours'    => (float) $h,
            ])
            ->sortKeys()
            ->values();

        $pdf = Pdf::loadView('timesheets.pdf', [
            'timesheet'  => $timesheet,
            'project'    => $project,
            'client'     => $project->client,
            'business'   => $business,
            'monthNames' => $monthNames,
            'dayNames'   => $dayNames,
            'workedDays' => $workedDays,
            'totalHours' => $timesheet->totalHours(),
            'earnings'   => $timesheet->totalEarnings(),
        ])->setPaper('a4');

        $month    = str_pad($timesheet->month, 2, '0', STR_PAD_LEFT);
        $prefix   = \Illuminate\Support\Str::slug(__('timesheets.report_title'));
        $slug     = \Illuminate\Support\Str::slug($project->name);
        $filename = "{$prefix}-{$slug}-{$month}-{$timesheet->year}.pdf";

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename, ['Content-Type' => 'application/pdf']);
    }

    private function monthNames(): array
    {
        return [
            1  => __('timesheets.months.january'),
            2  => __('timesheets.months.february'),
            3  => __('timesheets.months.march'),
            4  => __('timesheets.months.april'),
            5  => __('timesheets.months.may'),
            6  => __('timesheets.months.june'),
            7  => __('timesheets.months.july'),
            8  => __('timesheets.months.august'),
            9  => __('timesheets.months.september'),
            10 => __('timesheets.months.october'),
            11 => __('timesheets.months.november'),
            12 => __('timesheets.months.december'),
        ];
    }

    private function dayNames(): array
    {
        return [
            1 => __('timesheets.days.mon'),
            2 => __('timesheets.days.tue'),
            3 => __('timesheets.days.wed'),
            4 => __('timesheets.days.thu'),
            5 => __('timesheets.days.fri'),
            6 => __('timesheets.days.sat'),
            7 => __('timesheets.days.sun'),
        ];
    }
}
