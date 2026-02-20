@extends('layouts.main')

@section('content')
    <section class="card">
        <div class="toolbar">
            <div>
                <h1 class="page-title" style="margin:0;">Verifikasi Relawan</h1>
                <p class="muted" style="margin:0.4rem 0 0;">Daftar pendaftaran relawan untuk proses review admin.</p>
            </div>
            <form method="GET" action="{{ route('admin.relawans.index') }}" style="display:flex; gap:0.5rem; align-items:center; flex-wrap:wrap;">
                <label for="status" class="muted">Filter status</label>
                <select id="status" name="status">
                    <option value="">Semua</option>
                    <option value="pending" @selected($statusFilter === 'pending')>Pending</option>
                    <option value="approved" @selected($statusFilter === 'approved')>Approved</option>
                    <option value="rejected" @selected($statusFilter === 'rejected')>Rejected</option>
                </select>
                <button type="submit" class="btn btn-outline">
                    Terapkan
                </button>
            </form>
        </div>

        @if ($relawans->isEmpty())
            <p class="muted">Belum ada data relawan.</p>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Area Tugas</th>
                            <th>Status</th>
                            <th>Aktif</th>
                            <th>Kontak Publik</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relawans as $relawan)
                            <tr>
                                <td>{{ $relawan->nama }}</td>
                                <td>{{ $relawan->nik }}</td>
                                <td>{{ $relawan->area_tugas }}</td>
                                <td><span class="pill" style="text-transform:capitalize;">{{ $relawan->status }}</span></td>
                                <td>{{ $relawan->is_active ? 'Ya' : 'Tidak' }}</td>
                                <td>{{ $relawan->is_public_contact ? 'Ya' : 'Tidak' }}</td>
                                <td>{{ $relawan->files_count }}</td>
                                <td>
                                    <a href="{{ route('admin.relawans.show', $relawan) }}" class="btn btn-outline">Lihat Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top:1rem;">
                {{ $relawans->links() }}
            </div>
        @endif
    </section>
@endsection
