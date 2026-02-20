@extends('layouts.main')

@section('content')
    <section class="card card-glow" style="margin-bottom:1rem;">
        <span class="pill">Kontak Publik</span>
        <h1 class="page-title" style="margin-top:0.85rem;">Kontak Relawan Aktif</h1>
        <p class="muted" style="margin-bottom:0;">
            Halaman ini hanya menampilkan relawan yang sudah disetujui admin dan memberikan persetujuan kontak publik.
        </p>
    </section>

    @if ($relawans->isEmpty())
        <section class="card">
            <p class="muted" style="margin:0;">Belum ada relawan aktif yang dapat dihubungi publik.</p>
        </section>
    @else
        <section class="grid-3">
            @foreach ($relawans as $relawan)
                <article class="card">
                    <span class="pill">Aktif</span>
                    <h2 style="margin-top:0; margin-bottom:0.65rem; font-size:1.1rem;">{{ $relawan->nama }}</h2>
                    <p style="margin:0 0 0.3rem;"><strong>Area Tugas:</strong> {{ $relawan->area_tugas }}</p>
                    <p style="margin:0 0 0.3rem;"><strong>Lokasi:</strong> {{ $relawan->lokasi_domisili }}</p>
                    <p style="margin:0 0 0.3rem;"><strong>Kontak:</strong> {{ $relawan->masked_no_hp }}</p>
                    <p style="margin:0;"><strong>Status:</strong> Tersedia untuk dihubungi</p>
                </article>
            @endforeach
        </section>
    @endif
@endsection
