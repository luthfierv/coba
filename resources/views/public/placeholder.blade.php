@extends('layouts.main')

@section('content')
    <section class="card card-glow">
        <span class="pill">Info</span>
        <h1 class="page-title" style="margin-top:0.85rem;">{{ $title }}</h1>
        <p class="muted">{{ $description }}</p>
        <p style="margin-bottom:0;">
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke beranda</a>
        </p>
    </section>
@endsection
