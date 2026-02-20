<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Artikel extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'thumbnail_path',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'publish')
            ->whereNotNull('published_at');
    }

    public function getThumbnailUrlAttribute(): string
    {
        $path = trim((string) $this->thumbnail_path);

        if ($path === '') {
            return asset('images/beranda-random.jpg');
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        $publicPath = public_path(ltrim($path, '/'));
        if (is_file($publicPath)) {
            return asset(ltrim($path, '/'));
        }

        return Storage::url($path);
    }
}
