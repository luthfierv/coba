@extends('layouts.main')

@section('content')
    <section class="card" style="margin-bottom:1rem;">
        <div class="toolbar" style="margin-bottom:0.7rem;">
            <div>
                <h1 class="page-title" style="margin:0;">Log Aktivitas Admin</h1>
                <p class="muted" style="margin:0.4rem 0 0;">
                    Riwayat perubahan status relawan oleh admin.
                </p>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.logs.index') }}" class="grid-3">
            <div class="field">
                <label for="action">Filter aksi</label>
                <select id="action" name="action">
                    <option value="">Semua aksi</option>
                    @foreach ($allowedActions as $action)
                        <option value="{{ $action }}" @selected($actionFilter === $action)>{{ $action }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="relawan">Cari relawan (nama/NIK)</label>
                <input id="relawan" name="relawan" type="text" value="{{ $relawanFilter }}" placeholder="Contoh: Ahmad / 6301...">
            </div>
            <div class="field">
                <label for="admin">Cari admin (nama/email)</label>
                <input id="admin" name="admin" type="text" value="{{ $adminFilter }}" placeholder="Contoh: admin@...">
            </div>
            <div style="display:flex; gap:0.5rem; align-items:flex-end; flex-wrap:wrap;">
                <button type="submit" class="btn btn-outline">Terapkan</button>
                <a href="{{ route('admin.logs.index') }}" class="btn btn-outline">Reset</a>
            </div>
        </form>
    </section>

    <section class="card">
        @if ($logs->isEmpty())
            <p class="muted" style="margin:0;">Belum ada log aktivitas.</p>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Relawan</th>
                            <th>Admin</th>
                            <th>Aksi</th>
                            <th>Status</th>
                            <th>Aktif</th>
                            <th>Kontak Publik</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log->changed_at?->format('d-m-Y H:i:s') ?? '-' }}</td>
                                <td>
                                    @if ($log->relawan)
                                        <div><strong>{{ $log->relawan->nama }}</strong></div>
                                        <div class="muted">NIK: {{ $log->relawan->nik }}</div>
                                        <div style="margin-top:0.35rem;">
                                            <a href="{{ route('admin.relawans.show', $log->relawan_id) }}" class="btn btn-outline">Detail</a>
                                        </div>
                                    @else
                                        <span class="muted">Relawan tidak ditemukan</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($log->adminUser)
                                        <div><strong>{{ $log->adminUser->name }}</strong></div>
                                        <div class="muted">{{ $log->adminUser->email }}</div>
                                    @else
                                        <span class="muted">System</span>
                                    @endif
                                </td>
                                <td><span class="pill">{{ $log->action }}</span></td>
                                <td>{{ $log->old_status ?? '-' }} -> {{ $log->new_status ?? '-' }}</td>
                                <td>
                                    {{ is_null($log->old_is_active) ? '-' : ($log->old_is_active ? 'Ya' : 'Tidak') }}
                                    ->
                                    {{ is_null($log->new_is_active) ? '-' : ($log->new_is_active ? 'Ya' : 'Tidak') }}
                                </td>
                                <td>
                                    {{ is_null($log->old_is_public_contact) ? '-' : ($log->old_is_public_contact ? 'Ya' : 'Tidak') }}
                                    ->
                                    {{ is_null($log->new_is_public_contact) ? '-' : ($log->new_is_public_contact ? 'Ya' : 'Tidak') }}
                                </td>
                                <td>{{ $log->note ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top:1rem;">
                {{ $logs->links() }}
            </div>
        @endif
    </section>
@endsection
