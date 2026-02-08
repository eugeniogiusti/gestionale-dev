<?php

namespace App\Services\Statistics;

use App\Models\BusinessSettings;
use App\Queries\Statistics\StatisticsQuery;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

/**
 * Exports financial statistics as a downloadable PDF report.
 *
 * Can generate either a yearly or monthly report. Gathers data
 * via StatisticsQuery, renders the `statistics.pdf.report` Blade
 * template using DomPDF, and returns a download response.
 *
 * Usage:
 *   return (new StatisticsPdfExporter(2025))->download();       // yearly
 *   return (new StatisticsPdfExporter(2025, 3))->download();    // March 2025
 *
 * @see \App\Queries\Statistics\StatisticsQuery
 */
class StatisticsPdfExporter
{
    /**
     * @param int      $year  The report year.
     * @param int|null $month Optional month (1-12) to scope the report. Null = full year.
     */
    public function __construct(
        private int $year,
        private ?int $month = null
    ) {}

    /**
     * Generate and return the PDF as a download response.
     */
    public function download(): Response
    {
        $pdf = Pdf::loadView('statistics.pdf.report', $this->getData());

        return $pdf->download($this->getFilename());
    }

    private function getData(): array
    {
        $business = BusinessSettings::current();
        $currencyCode = $business->default_currency ?? 'EUR';
        $currencySymbol = BusinessSettings::CURRENCIES[$currencyCode] ?? $currencyCode;

        return [
            'year' => $this->year,
            'month' => $this->month,
            'stats' => (new StatisticsQuery($this->year, $this->month))->handle(),
            'periodLabel' => $this->getPeriodLabel(),
            'generatedAt' => now(),
            'currencySymbol' => $currencySymbol,
        ];
    }

    private function getPeriodLabel(): string
    {
        if ($this->month) {
            return Carbon::create($this->year, $this->month, 1)->translatedFormat('F Y');
        }

        return (string) $this->year;
    }

    private function getFilename(): string
    {
        $title = __('statistics.title');

        if ($this->month) {
            return sprintf('%s-%d-%02d.pdf', $title, $this->year, $this->month);
        }

        return sprintf('%s-%d.pdf', $title, $this->year);
    }
}
