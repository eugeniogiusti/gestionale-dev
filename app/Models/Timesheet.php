<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = [
        'project_id',
        'year',
        'month',
        'daily_hours',
        'hourly_rate',
        'notes',
    ];

    protected $casts = [
        'daily_hours' => 'array',
        'hourly_rate' => 'decimal:2',
        'year'        => 'integer',
        'month'       => 'integer',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function totalHours(): float
    {
        return (float) array_sum($this->daily_hours ?? []);
    }

    public function totalEarnings(): float
    {
        return $this->totalHours() * (float) ($this->hourly_rate ?? 0);
    }
}
