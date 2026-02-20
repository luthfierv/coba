# Guide Aplikasi BNPB (Revisi Final)

## 1. Ringkasan Sistem
Sistem ini adalah aplikasi informasi penanggulangan bencana dengan fokus pada:
- edukasi publik melalui artikel,
- pendaftaran relawan,
- verifikasi relawan oleh admin,
- publikasi kontak relawan aktif yang aman untuk publik.

## 2. Konsep Baru Alur Relawan
Alur final relawan:
1. User mendaftar relawan.
2. Data tersimpan dengan status awal `pending`.
3. Admin melakukan verifikasi.
4. Jika disetujui, status menjadi `approved`.
5. Relawan otomatis masuk:
- daftar relawan aktif,
- kontak relawan aktif publik.

## 3. Revisi Struktur Data

### 3.1 Tabel `relawans` (final)
Field utama:
- `id`
- `nama`
- `nik`
- `pekerjaan`
- `pendidikan`
- `alamat`
- `no_hp`
- `email`
- `lokasi_domisili`
- `area_tugas`
- `status` (`pending` / `approved` / `rejected`)

Field yang sangat disarankan:
- `tanggal_disetujui` (nullable datetime)
- `masa_aktif` (nullable date/datetime)
- `is_public_contact` (boolean, default `false`) sebagai persetujuan tampil di publik

Catatan:
- fitur nonaktifkan relawan bisa menggunakan field tambahan `is_active` (boolean) atau menambah nilai status `inactive`.

### 3.2 Tabel `relawan_files`
Untuk upload multi-file pendaftaran, simpan terpisah di tabel `relawan_files`:
- `id`
- `relawan_id` (foreign key ke `relawans.id`)
- `file_path`
- `file_name`
- `file_type`
- `file_size`
- `created_at`
- `updated_at`

## 4. Modul Final Sistem

### 4.1 Public
- Landing Page
- Artikel Penanggulangan Bencana
- Daftar Relawan
- Kontak Relawan Aktif
- Status Pendaftaran

### 4.2 Admin
- Dashboard
- Approval Relawan
- Manajemen Artikel
- Manajemen Data Relawan

## 5. Modul Baru: Kontak Relawan Aktif

### 5.1 Tujuan
Menampilkan relawan yang telah diverifikasi admin dan dapat dihubungi publik.

### 5.2 Rule Data
Hanya tampilkan relawan dengan kondisi:
- `status = approved`
- disarankan hanya jika `is_public_contact = true`

### 5.3 Data yang Boleh Ditampilkan
- Nama
- Area Tugas
- Lokasi Domisili
- Nomor HP (boleh disamarkan sebagian)
- Status tampilan: `Aktif`

### 5.4 Data yang Tidak Boleh Ditampilkan
- NIK
- alamat lengkap
- file dokumen
- data sensitif lain

### 5.5 Route Public
- `GET /kontak-relawan`

### 5.6 Query Logic
```php
$relawans = Relawan::where('status', 'approved')->get();
```

Rekomendasi query lebih aman:
```php
$relawans = Relawan::query()
    ->where('status', 'approved')
    ->where('is_public_contact', true)
    ->get();
```

## 6. Penempatan di Landing Page
Tambahkan section:
`Relawan Aktif yang Dapat Dihubungi`

Format card:
```text
[Nama]
Area Tugas: DIY
Lokasi: Yogyakarta
Kontak: 08xxxxxxx
Status: Aktif
```

Tombol aksi:
- `Lihat Semua Relawan` -> arahkan ke `/kontak-relawan`

## 7. Keamanan dan Privasi
Aturan minimum:
- jangan tampilkan NIK ke publik,
- jangan tampilkan alamat lengkap ke publik,
- lakukan validasi data sebelum approve,
- disarankan ada consent publik (`is_public_contact`),
- audit perubahan status relawan (siapa approve/reject dan kapan).

## 8. Flow Aplikasi (Final)

### 8.1 Global Flow
1. User membuka website.
2. Landing page tampil.
3. User memilih: baca artikel, daftar relawan, atau lihat kontak relawan aktif.
4. Jika mendaftar, data masuk database dengan status `pending`.
5. Admin login dan verifikasi.
6. Jika `approved`, relawan tampil di halaman kontak relawan aktif.

### 8.2 Public Flow

#### A. Flow Landing Page
1. User akses `/`.
2. Sistem menampilkan hero, tentang BNPB, peran relawan, artikel terbaru, kontak.
3. User memilih menu sesuai kebutuhan.

#### B. Flow Artikel Penanggulangan Bencana
1. User klik menu artikel.
2. Sistem menampilkan list artikel dengan status `publish`.
3. User klik artikel.
4. Sistem menampilkan detail artikel.

#### C. Flow Pendaftaran Relawan
1. User klik `Daftar Relawan`.
2. Form tampil.
3. User isi data:
- nama,
- nik,
- pekerjaan,
- pendidikan,
- alamat,
- no_hp,
- email,
- lokasi_domisili,
- area_tugas,
- upload multiple file.
4. User submit.
5. Sistem validasi:
- jika gagal, tampil error,
- jika valid, simpan data.
6. Status otomatis `pending`.
7. Sistem tampilkan notifikasi sukses.

#### D. Flow Status Relawan
1. User buka halaman status.
2. User input NIK atau email.
3. Sistem tampilkan status `pending` / `approved` / `rejected`.

#### E. Flow Kontak Relawan Aktif
1. User klik `Kontak Relawan`.
2. Sistem ambil data relawan aktif.
3. Sistem tampilkan data publik yang diizinkan.

### 8.3 Admin Flow

#### A. Flow Login Admin
1. Admin buka `/admin`.
2. Admin input email dan password.
3. Sistem validasi.
4. Admin masuk dashboard.

#### B. Flow Verifikasi Relawan
1. Admin buka menu relawan.
2. Sistem tampilkan daftar relawan.
3. Admin buka detail.
4. Admin review data dan file dokumen.
5. Admin pilih `Approve` atau `Reject`.
6. Jika approve:
- `status = approved`,
- `tanggal_disetujui` terisi.
7. Relawan otomatis tampil di kontak relawan aktif (jika memenuhi rule publik).

#### C. Flow Manajemen Artikel
1. Admin buka menu artikel.
2. Admin dapat tambah, edit, upload thumbnail, publish/draft, dan hapus.
3. Artikel hanya tampil ke publik jika status `publish`.

### 8.4 Flow Status Relawan (Detail Logic)
1. Pendaftaran masuk.
2. Status default `pending`.
3. Admin approve.
4. Status berubah `approved`.
5. Data tampil di kontak relawan aktif.
6. Admin nonaktifkan relawan.
7. Data tidak lagi tampil di kontak relawan aktif.

### 8.5 Flow Database
1. User submit form.
2. Data masuk tabel `relawans`.
3. File upload masuk tabel `relawan_files`.
4. Admin update status relawan.
5. Query public hanya mengambil relawan `approved`.

## 9. Matrix Role
| Tahap | User | Admin |
|---|---|---|
| Baca artikel | Ya | Ya |
| Daftar relawan | Ya | Tidak |
| Verifikasi relawan | Tidak | Ya |
| Publish artikel | Tidak | Ya |
| Lihat relawan aktif | Ya | Ya |

## 10. Diagram Sederhana (Text)
```text
           +------------------+
           |   LANDING PAGE   |
           +------------------+
                    |
     ----------------------------------
     |                |              |
  Artikel        Daftar         Kontak
  Bencana        Relawan        Relawan
                      |
                Status: Pending
                      |
                Admin Verifikasi
                      |
         ----------------------------
         |                          |
     Approve                     Reject
         |
   Masuk Kontak Relawan
```

## 11. Route Blueprint (Target)

### 11.1 Public
- `GET /`
- `GET /artikel`
- `GET /artikel/{slug}`
- `GET /daftar-relawan`
- `POST /daftar-relawan`
- `GET /status-relawan`
- `POST /status-relawan`
- `GET /kontak-relawan`

### 11.2 Admin
- `GET /admin` (login)
- `POST /admin/login`
- `GET /admin/dashboard`
- `GET /admin/relawans`
- `GET /admin/relawans/{id}`
- `PATCH /admin/relawans/{id}/approve`
- `PATCH /admin/relawans/{id}/reject`
- `PATCH /admin/relawans/{id}/nonaktifkan`
- `Resource /admin/artikels`

## 12. Kesimpulan
Struktur final sistem memiliki 3 alur besar:
- alur edukasi (artikel),
- alur pendaftaran relawan,
- alur verifikasi dan publikasi relawan aktif.

Dokumen ini menjadi baseline implementasi resmi untuk tahap pengembangan berikutnya.
