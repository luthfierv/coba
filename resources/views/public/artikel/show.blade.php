@extends('layouts.main')

@section('content')
    <article class="card" style="margin-bottom:1rem;">
        <span class="pill">Artikel Publish</span>
        <p class="muted" style="margin-top:0; margin-bottom:0.55rem;">
            Tanggal Upload: {{ $artikel->published_at?->format('d-m-Y H:i') ?? '-' }}
        </p>
        <h1 class="page-title" style="margin:0 0 0.7rem;">{{ $artikel->judul }}</h1>
        <img
            src="{{ $artikel->thumbnail_url }}"
            alt="Foto artikel {{ $artikel->judul }}"
            style="width:100%; max-height:380px; object-fit:cover; border-radius:12px; border:1px solid var(--line); margin-bottom:0.95rem;">
        <p class="muted" style="white-space:pre-line; margin:0 0 1rem;">{{ $artikel->ringkasan }}</p>
        <div style="white-space:pre-line; line-height:1.72;">{{ $artikel->konten }}</div>
    </article>

    @if ($relatedArtikels->isNotEmpty())
        <section class="card">
            <h2 style="margin-top:0;">Artikel Lainnya</h2>
            <ul style="margin:0; padding-left:1rem; display:grid; gap:0.5rem;">
                @foreach ($relatedArtikels as $item)
                    <li>
                        <a href="{{ route('artikel.show', $item->slug) }}" style="text-decoration:none;">
                            {{ $item->judul }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif
@endsection
