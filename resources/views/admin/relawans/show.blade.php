@extends('layouts.main')

@section('content')
    <section class="card card-glow" style="margin-bottom:1rem;">
        <div class="toolbar" style="margin-bottom:0;">
            <div>
                <span class="pill">ID #{{ $relawan->id }}</span>
                <h1 class="page-title" style="margin:0.8rem 0 0;">Detail Relawan</h1>
                <p class="muted" style="margin:0.4rem 0 0;">Status saat ini: <strong>{{ $relawan->status }}</strong></p>
            </div>
            <a href="{{ route('admin.relawans.index') }}" class="btn btn-outline">Kembali ke daftar</a>
        </div>
    </section>

    <section class="card" style="margin-bottom:1rem;">
        <h2 style="margin-top:0;">Data Pendaftaran</h2>
        <div class="grid-2">
            <div class="card"><strong>Nama:</strong><br>{{ $relawan->nama }}</div>
            <div class="card"><strong>NIK:</strong><br>{{ $relawan->nik }}</div>
            <div class="card"><strong>Pekerjaan:</strong><br>{{ $relawan->pekerjaan }}</div>
            <div class="card"><strong>Pendidikan:</strong><br>{{ $relawan->pendidikan }}</div>
            <div class="card"><strong>No HP:</strong><br>{{ $relawan->no_hp }}</div>
            <div class="card"><strong>Email:</strong><br>{{ $relawan->email }}</div>
            <div class="card"><strong>Lokasi Domisili:</strong><br>{{ $relawan->lokasi_domisili }}</div>
            <div class="card"><strong>Area Tugas:</strong><br>{{ $relawan->area_tugas }}</div>
            <div class="card"><strong>Aktif:</strong><br>{{ $relawan->is_active ? 'Ya' : 'Tidak' }}</div>
            <div class="card"><strong>Kontak Publik:</strong><br>{{ $relawan->is_public_contact ? 'Ya' : 'Tidak' }}</div>
            <div class="card"><strong>Tanggal Disetujui:</strong><br>{{ $relawan->tanggal_disetujui?->format('d-m-Y H:i') ?? '-' }}</div>
            <div class="card"><strong>Alamat:</strong><br>{{ $relawan->alamat }}</div>
        </div>
    </section>

    <section class="card" style="margin-bottom:1rem;">
        <h2 style="margin-top:0;">Dokumen Relawan</h2>
        @if ($relawan->files->isEmpty())
            <p class="muted">Tidak ada dokumen.</p>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama File</th>
                            <th>Tipe</th>
                            <th>Ukuran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relawan->files as $file)
                            <tr>
                                <td>{{ $file->file_name }}</td>
                                <td>{{ $file->file_type ?? '-' }}</td>
                                <td>{{ number_format($file->file_size / 1024, 1) }} KB</td>
                                <td>
                                    <a href="{{ route('admin.relawans.files.download', [$relawan, $file]) }}" class="btn btn-outline">
                                        Unduh
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <section class="card">
        <h2 style="margin-top:0;">Aksi Verifikasi</h2>
        <div style="display:flex; flex-wrap:wrap; gap:0.6rem;">
            <form action="{{ route('admin.relawans.approve', $relawan) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">
                    Approve
                </button>
            </form>

            <form action="{{ route('admin.relawans.reject', $relawan) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger">
                    Reject
                </button>
            </form>

            <form action="{{ route('admin.relawans.nonaktifkan', $relawan) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-dark">
                    Nonaktifkan
                </button>
            </form>

            @if ($relawan->is_public_contact)
                <form action="{{ route('admin.relawans.hide-contact', $relawan) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-primary">
                        Sembunyikan Kontak Publik
                    </button>
                </form>
            @else
                <form action="{{ route('admin.relawans.publish-contact', $relawan) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-primary">
                        Tampilkan Kontak Publik
                    </button>
                </form>
            @endif
        </div>
    </section>

    <section class="card" style="margin-top:1rem;">
        <h2 style="margin-top:0;">Audit Perubahan</h2>
        @if ($relawan->statusLogs->isEmpty())
            <p class="muted" style="margin:0;">Belum ada riwayat perubahan.</p>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Admin</th>
                            <th>Aksi</th>
                            <th>Status</th>
                            <th>Aktif</th>
                            <th>Kontak Publik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relawan->statusLogs as $log)
                            <tr>
                                <td>{{ $log->changed_at?->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $log->adminUser?->email ?? 'System' }}</td>
                                <td>{{ $log->action }}</td>
                                <td>{{ $log->old_status ?? '-' }} -> {{ $log->new_status ?? '-' }}</td>
                                <td>{{ is_null($log->old_is_active) ? '-' : ($log->old_is_active ? 'Ya' : 'Tidak') }} -> {{ is_null($log->new_is_active) ? '-' : ($log->new_is_active ? 'Ya' : 'Tidak') }}</td>
                                <td>{{ is_null($log->old_is_public_contact) ? '-' : ($log->old_is_public_contact ? 'Ya' : 'Tidak') }} -> {{ is_null($log->new_is_public_contact) ? '-' : ($log->new_is_public_contact ? 'Ya' : 'Tidak') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
