<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class RelawanStatusLog extends Model
{
    protected $fillable = [
        'relawan_id',
        'admin_user_id',
        'action',
        'old_status',
        'new_status',
        'old_is_active',
        'new_is_active',
        'old_is_public_contact',
        'new_is_public_contact',
        'note',
        'changed_at',
    ];

    protected function casts(): array
    {
        return [
            'old_is_active' => 'boolean',
            'new_is_active' => 'boolean',
            'old_is_public_contact' => 'boolean',
            'new_is_public_contact' => 'boolean',
            'changed_at' => 'datetime',
        ];
    }

    public function relawan(): BelongsTo
    {
        return $this->belongsTo(Relawan::class);
    }

    public function adminUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }
}
