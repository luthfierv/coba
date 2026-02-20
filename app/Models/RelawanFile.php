<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class RelawanFile extends Model
{
    protected $fillable = [
        'relawan_id',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
    ];

    public function relawan(): BelongsTo
    {
        return $this->belongsTo(Relawan::class);
    }
}
