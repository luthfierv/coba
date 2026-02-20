<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertArtikelRequest;
use App\Models\Artikel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    public function index(): View
    {
        $artikels = Artikel::query()
            ->latest()
            ->paginate(12);

        return view('admin.artikels.index', compact('artikels'));
    }

    public function create(): View
    {
        return view('admin.artikels.create');
    }

    public function store(UpsertArtikelRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $thumbnailPath = $request->file('thumbnail')?->store('artikel-thumbnails');
        $status = $validated['status'];

        Artikel::query()->create([
            'judul' => $validated['judul'],
            'slug' => $this->makeUniqueSlug($validated['judul']),
            'ringkasan' => $this->resolveSummary($validated['ringkasan'] ?? null, $validated['konten']),
            'konten' => $validated['konten'],
            'thumbnail_path' => $thumbnailPath,
            'status' => $status,
            'published_at' => $status === 'publish' ? now() : null,
        ]);

        return redirect()
            ->route('admin.artikels.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Artikel $artikel): View
    {
        return view('admin.artikels.show', compact('artikel'));
    }

    public function edit(Artikel $artikel): View
    {
        return view('admin.artikels.edit', compact('artikel'));
    }

    public function update(UpsertArtikelRequest $request, Artikel $artikel): RedirectResponse
    {
        $validated = $request->validated();
        $status = $validated['status'];
        $thumbnailPath = $artikel->thumbnail_path;

        if ($request->hasFile('thumbnail')) {
            if ($thumbnailPath !== null) {
                Storage::delete($thumbnailPath);
            }

            $thumbnailPath = $request->file('thumbnail')?->store('artikel-thumbnails');
        }

        $artikel->update([
            'judul' => $validated['judul'],
            'slug' => $this->makeUniqueSlug($validated['judul'], $artikel),
            'ringkasan' => $this->resolveSummary($validated['ringkasan'] ?? null, $validated['konten']),
            'konten' => $validated['konten'],
            'thumbnail_path' => $thumbnailPath,
            'status' => $status,
            'published_at' => $status === 'publish'
                ? ($artikel->published_at ?? now())
                : null,
        ]);

        return redirect()
            ->route('admin.artikels.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel): RedirectResponse
    {
        if ($artikel->thumbnail_path !== null) {
            Storage::delete($artikel->thumbnail_path);
        }

        $artikel->delete();

        return redirect()
            ->route('admin.artikels.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    private function resolveSummary(?string $summary, string $content): string
    {
        if ($summary !== null && trim($summary) !== '') {
            return trim($summary);
        }

        return Str::limit(trim(strip_tags($content)), 180, '...');
    }

    private function makeUniqueSlug(string $title, ?Artikel $ignore = null): string
    {
        $baseSlug = Str::slug($title);
        $baseSlug = $baseSlug !== '' ? $baseSlug : 'artikel';
        $slug = $baseSlug;
        $suffix = 1;

        while ($this->slugExists($slug, $ignore)) {
            $slug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    private function slugExists(string $slug, ?Artikel $ignore = null): bool
    {
        return Artikel::query()
            ->when($ignore !== null, fn ($query) => $query->where('id', '!=', $ignore->id))
            ->where('slug', $slug)
            ->exists();
    }
}
