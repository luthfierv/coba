@extends('layouts.main')

@section('content')
    <section class="card card-glow" style="margin-bottom:1rem;">
        <span class="pill">Admin Overview</span>
        <h1 class="page-title" style="margin-top:0.85rem;">Dashboard Admin</h1>
        <p class="muted">Ringkasan data relawan untuk modul verifikasi.</p>
        <p style="margin:0.7rem 0 1rem;">
            <a href="{{ route('admin.relawans.index') }}" class="btn btn-outline">Buka Manajemen Relawan</a>
        </p>

        <div class="grid-2">
            <div class="card">
                <div class="muted">Total</div>
                <div style="font-size:1.6rem; font-weight:800;">{{ $counts['total'] }}</div>
            </div>
            <div class="card">
                <div class="muted">Pending</div>
                <div style="font-size:1.6rem; font-weight:800;">{{ $counts['pending'] }}</div>
            </div>
            <div class="card">
                <div class="muted">Approved</div>
                <div style="font-size:1.6rem; font-weight:800;">{{ $counts['approved'] }}</div>
            </div>
            <div class="card">
                <div class="muted">Rejected</div>
                <div style="font-size:1.6rem; font-weight:800;">{{ $counts['rejected'] }}</div>
            </div>
        </div>
    </section>

    <section class="card">
        <h2 style="margin-top:0;">Pendaftar Terbaru</h2>
        @if ($latestRelawans->isEmpty())
            <p class="muted">Belum ada data pendaftaran relawan.</p>
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
                            <th>Waktu Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestRelawans as $relawan)
                            <tr>
                                <td>{{ $relawan->nama }}</td>
                                <td>{{ $relawan->nik }}</td>
                                <td>{{ $relawan->area_tugas }}</td>
                                <td><span class="pill">{{ $relawan->status }}</span></td>
                                <td>{{ $relawan->is_active ? 'Ya' : 'Tidak' }}</td>
                                <td>{{ $relawan->created_at?->format('d-m-Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.relawans.show', $relawan) }}" class="btn btn-outline">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
