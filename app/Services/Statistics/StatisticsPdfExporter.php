<?php

namespace App\Services\Statistics;

use App\Models\BusinessSettings;
use App\Queries\Statistics\StatisticsQuery;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class StatisticsPdfExporter
{
    public function __construct(
        private int $year,
        private ?int $month = null
    ) {}

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
