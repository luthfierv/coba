@extends('layouts.main')

@section('content')
    <section class="card" style="max-width:900px; margin:auto;">
        <span class="pill">Pendaftaran Relawan</span>
        <h1 class="page-title" style="margin-top:0.85rem;">Form Pendaftaran Relawan</h1>
        <p class="muted">Isi data dengan lengkap. Status awal pendaftaran otomatis <strong>pending</strong>.</p>

        <form action="{{ route('relawan.store') }}" method="POST" enctype="multipart/form-data" style="display:grid; gap:0.85rem; margin-top:1rem;">
            @csrf

            <div class="grid-2">
                <div class="field">
                    <label for="nama">Nama</label>
                    <input id="nama" name="nama" type="text" value="{{ old('nama') }}" required>
                </div>
                <div class="field">
                    <label for="nik">NIK (16 digit)</label>
                    <input id="nik" name="nik" type="text" value="{{ old('nik') }}" required maxlength="16">
                </div>
            </div>

            <div class="grid-2">
                <div class="field">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input id="pekerjaan" name="pekerjaan" type="text" value="{{ old('pekerjaan') }}" required>
                </div>
                <div class="field">
                    <label for="pendidikan">Pendidikan</label>
                    <input id="pendidikan" name="pendidikan" type="text" value="{{ old('pendidikan') }}" required>
                </div>
            </div>

            <div class="field">
                <label for="alamat">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="grid-2">
                <div class="field">
                    <label for="no_hp">Nomor HP</label>
                    <input id="no_hp" name="no_hp" type="text" value="{{ old('no_hp') }}" required>
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="field">
                    <label for="lokasi_domisili">Lokasi Domisili</label>
                    <input id="lokasi_domisili" name="lokasi_domisili" type="text" value="{{ old('lokasi_domisili') }}" required>
                </div>
                <div class="field">
                    <label for="area_tugas">Area Tugas</label>
                    <input id="area_tugas" name="area_tugas" type="text" value="{{ old('area_tugas') }}" required>
                </div>
            </div>

            <div class="field">
                <label for="dokumen">Dokumen Pendukung (maks 5 file, 5MB/file)</label>
                <input id="dokumen" name="dokumen[]" type="file" multiple required>
                <small class="muted">Format: PDF, JPG, JPEG, PNG, DOC, DOCX.</small>
            </div>

            <div style="display:flex; gap:0.65rem; flex-wrap:wrap;">
                <button type="submit" class="btn btn-primary">
                    Kirim Pendaftaran
                </button>
                <a href="{{ route('status-relawan.index') }}" class="btn btn-outline">Cek Status Pendaftaran</a>
            </div>
        </form>
    </section>
@endsection
