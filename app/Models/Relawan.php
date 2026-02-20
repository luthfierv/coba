<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'pekerjaan',
        'pendidikan',
        'alamat',
        'no_hp',
        'email',
        'lokasi_domisili',
        'area_tugas',
        'status',
        'tanggal_disetujui',
        'masa_aktif',
        'is_public_contact',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_disetujui' => 'datetime',
            'masa_aktif' => 'date',
            'is_public_contact' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function files(): HasMany
    {
        return $this->hasMany(RelawanFile::class);
    }

    public function statusLogs(): HasMany
    {
        return $this->hasMany(RelawanStatusLog::class);
    }
}
