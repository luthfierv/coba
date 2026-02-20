@php
    $isEdit = isset($artikel);
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" style="display:grid; gap:0.85rem;">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="field">
        <label for="judul">Judul Artikel</label>
        <input id="judul" name="judul" type="text" value="{{ old('judul', $artikel->judul ?? '') }}" required maxlength="255">
    </div>

    <div class="field">
        <label for="ringkasan">Ringkasan (opsional)</label>
        <textarea id="ringkasan" name="ringkasan" rows="3">{{ old('ringkasan', $artikel->ringkasan ?? '') }}</textarea>
    </div>

    <div class="field">
        <label for="konten">Konten Artikel</label>
        <textarea id="konten" name="konten" rows="12" required>{{ old('konten', $artikel->konten ?? '') }}</textarea>
    </div>

    <div class="field">
        <label for="status">Status</label>
        <select id="status" name="status" required>
            @php $selectedStatus = old('status', $artikel->status ?? 'draft'); @endphp
            <option value="draft" @selected($selectedStatus === 'draft')>Draft</option>
            <option value="publish" @selected($selectedStatus === 'publish')>Publish</option>
        </select>
    </div>

    <div class="field">
        <label for="thumbnail">Thumbnail (opsional, max 2MB)</label>
        <input id="thumbnail" name="thumbnail" type="file" accept="image/*">
        @if ($isEdit && $artikel->thumbnail_path)
            <small class="muted">Thumbnail saat ini: {{ $artikel->thumbnail_path }}</small>
        @endif
    </div>

    <div style="display:flex; gap:0.6rem; flex-wrap:wrap;">
        <button type="submit" class="btn btn-primary">
            {{ $submitLabel }}
        </button>
        <a href="{{ route('admin.artikels.index') }}" class="btn btn-outline">Kembali</a>
    </div>
</form>
