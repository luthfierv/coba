@extends('layouts.main')

@section('content')
    <section class="card card-glow" style="margin-bottom:1rem;">
        <span class="pill">Edukasi Publik</span>
        <h1 class="page-title" style="margin:0.85rem 0 0;">Artikel Penanggulangan Bencana</h1>
        <p class="muted" style="margin:0.45rem 0 0;">Kumpulan artikel edukasi yang sudah dipublikasikan.</p>
    </section>

    @if ($artikels->isEmpty())
        <section class="card">
            <p class="muted" style="margin:0;">Belum ada artikel publish.</p>
        </section>
    @else
        <section class="grid-3 artikel-grid">
            @foreach ($artikels as $artikel)
                <article class="card artikel-card">
                    <img
                        src="{{ $artikel->thumbnail_url }}"
                        alt="Foto artikel {{ $artikel->judul }}"
                        class="artikel-thumb">
                    <span class="pill">Publish</span>
                    <h2 style="margin:0; font-size:1.1rem;">{{ $artikel->judul }}</h2>
                    <p class="muted artikel-date">
                        Tanggal Upload: {{ $artikel->published_at?->format('d-m-Y H:i') ?? '-' }}
                    </p>
                    <p style="margin:0 0 0.7rem;">{{ \Illuminate\Support\Str::limit($artikel->ringkasan, 180) }}</p>
                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn btn-outline">Baca Detail</a>
                </article>
            @endforeach
        </section>
        <div style="margin-top:1rem;">
            {{ $artikels->links() }}
        </div>
    @endif

    <style>
        .artikel-grid {
            align-items: stretch;
        }

        .artikel-card {
            display: grid;
            gap: 0.65rem;
        }

        .artikel-thumb {
            width: 100%;
            height: 190px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid var(--line);
            display: block;
        }

        .artikel-date {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
@endsection
