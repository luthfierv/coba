@extends('layouts.main')

@section('content')
    <section class="card card-glow" style="margin-bottom:1rem;">
        <div class="toolbar" style="margin-bottom:0;">
            <div>
                <span class="pill">Artikel Detail</span>
                <h1 class="page-title" style="margin:0.8rem 0 0;">{{ $artikel->judul }}</h1>
                <p class="muted" style="margin:0.4rem 0 0;">
                    Status: <strong>{{ $artikel->status }}</strong> | Published: {{ $artikel->published_at?->format('d-m-Y H:i') ?? '-' }}
                </p>
            </div>
            <div style="display:flex; gap:0.6rem; flex-wrap:wrap;">
                <a href="{{ route('admin.artikels.edit', $artikel) }}" class="btn btn-outline">Edit</a>
                <a href="{{ route('admin.artikels.index') }}" class="btn btn-outline">Kembali</a>
            </div>
        </div>
    </section>

    <section class="card" style="margin-bottom:1rem;">
        <h2 style="margin-top:0;">Ringkasan</h2>
        <p style="margin-bottom:0; white-space:pre-line;">{{ $artikel->ringkasan }}</p>
    </section>

    <section class="card">
        <h2 style="margin-top:0;">Konten</h2>
        <div style="white-space:pre-line; line-height:1.72;">{{ $artikel->konten }}</div>
    </section>
@endsection
