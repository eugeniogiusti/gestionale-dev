<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents an ATECO activity code associated with the business owner.
 *
 * Each record stores a code (e.g. 62.01), a description, and whether
 * it is the primary code. Only one code should have is_primary = true at a time,
 * enforced by AtecoCodeController::setPrimary().
 */
class AtecoCode extends Model
{
    protected $table = 'ateco_codes';

    protected $fillable = [
        'code',
        'description',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];
}
