<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiSettings extends Model
{
    protected $table = 'ai_settings';

    protected $fillable = [
        'ai_enabled',
        'ai_api_key',
    ];

    protected $casts = [
        'ai_enabled' => 'boolean',
        'ai_api_key' => 'encrypted',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}
