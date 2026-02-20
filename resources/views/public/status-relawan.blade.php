@extends('layouts.main')

@section('content')
    <section class="card" style="max-width:760px; margin:auto; margin-bottom:1rem;">
        <span class="pill">Status Pendaftaran</span>
        <h1 class="page-title" style="margin-top:0.85rem;">Cek Status Pendaftaran Relawan</h1>
        <p class="muted">Masukkan NIK atau email yang digunakan saat pendaftaran.</p>

        <form action="{{ route('status-relawan.check') }}" method="POST" style="display:grid; gap:0.9rem; margin-top:1rem;">
            @csrf

            <div class="field">
                <label for="nik">NIK</label>
                <input id="nik" name="nik" type="text" maxlength="16" value="{{ old('nik', $input['nik']) }}">
            </div>

            <div style="text-align:center;" class="pill">atau</div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $input['email']) }}">
            </div>

            <button type="submit" class="btn btn-primary" style="width:max-content;">
                Cek Status
            </button>
        </form>
    </section>

    @if ($searched)
        <section class="card" style="max-width:760px; margin:auto;">
            @if ($result === null)
                <h2 style="margin-top:0;">Hasil Pencarian</h2>
                <p style="margin:0;">Data pendaftaran tidak ditemukan.</p>
            @else
                <h2 style="margin-top:0;">Status Pendaftaran</h2>
                <div class="grid-2">
                    <div class="card">
                        <div class="muted">Nama</div>
                        <strong>{{ $result->nama }}</strong>
                    </div>
                    <div class="card">
                        <div class="muted">Status</div>
                        <strong style="text-transform:capitalize;">{{ $result->status }}</strong>
                    </div>
                    <div class="card">
                        <div class="muted">Tanggal Daftar</div>
                        <strong>{{ $result->created_at?->format('d-m-Y H:i') ?? '-' }}</strong>
                    </div>
                    <div class="card">
                        <div class="muted">Tanggal Disetujui</div>
                        <strong>{{ $result->tanggal_disetujui?->format('d-m-Y H:i') ?? '-' }}</strong>
                    </div>
                </div>
            @endif
        </section>
    @endif
@endsection
