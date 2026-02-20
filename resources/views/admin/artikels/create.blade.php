@extends('layouts.main')

@section('content')
    <section class="card" style="max-width:900px; margin:auto;">
        <span class="pill">Artikel Baru</span>
        <h1 class="page-title" style="margin-top:0.85rem;">Tambah Artikel</h1>
        <p class="muted">Buat artikel baru, simpan sebagai draft atau langsung publish.</p>
        @include('admin.artikels._form', [
            'action' => route('admin.artikels.store'),
            'submitLabel' => 'Simpan Artikel',
        ])
    </section>
@endsection
