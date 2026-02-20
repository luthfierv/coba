@extends('layouts.main')

@section('content')
    <section class="card" style="max-width:900px; margin:auto;">
        <span class="pill">Editor Artikel</span>
        <h1 class="page-title" style="margin-top:0.85rem;">Edit Artikel</h1>
        <p class="muted">Perbarui konten artikel dan atur status draft/publish.</p>
        @include('admin.artikels._form', [
            'artikel' => $artikel,
            'action' => route('admin.artikels.update', $artikel),
            'submitLabel' => 'Update Artikel',
        ])
    </section>
@endsection
