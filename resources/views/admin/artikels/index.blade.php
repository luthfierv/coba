@extends('layouts.main')

@section('content')
    <section class="card" style="margin-bottom:1rem;">
        <div class="toolbar">
            <div>
                <h1 class="page-title" style="margin:0;">Manajemen Artikel</h1>
                <p class="muted" style="margin:0.4rem 0 0;">Kelola artikel edukasi bencana dengan status draft atau publish.</p>
            </div>
            <a href="{{ route('admin.artikels.create') }}" class="btn btn-primary">
                Tambah Artikel
            </a>
        </div>
    </section>

    <section class="card">
        @if ($artikels->isEmpty())
            <p class="muted" style="margin:0;">Belum ada artikel.</p>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikels as $artikel)
                            <tr>
                                <td>{{ $artikel->judul }}</td>
                                <td>{{ $artikel->slug }}</td>
                                <td><span class="pill">{{ $artikel->status }}</span></td>
                                <td>{{ $artikel->published_at?->format('d-m-Y H:i') ?? '-' }}</td>
                                <td>
                                    <div style="display:flex; gap:0.6rem; flex-wrap:wrap;">
                                        <a href="{{ route('admin.artikels.edit', $artikel) }}" class="btn btn-outline">Edit</a>
                                        <a href="{{ route('admin.artikels.show', $artikel) }}" class="btn btn-outline">Lihat</a>
                                        <form action="{{ route('admin.artikels.destroy', $artikel) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="margin-top:1rem;">
                {{ $artikels->links() }}
            </div>
        @endif
    </section>
@endsection
