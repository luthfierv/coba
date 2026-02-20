# Rencana Pengembangan BNPB (Sederhana)

## Tujuan
Rencana ini dibuat ringkas per fase sebagai panduan eksekusi dari konsep di `guide.md`.

## Fase 1: Fondasi
Tujuan:
- menyiapkan pondasi sistem.

Output:
- autentikasi admin aktif,
- tabel `relawans` dan `relawan_files` siap,
- struktur halaman dasar public/admin tersedia.

## Fase 2: Pendaftaran Relawan
Tujuan:
- user bisa mendaftar relawan dari halaman publik.

Output:
- form `daftar relawan` berjalan,
- upload multi-file tersimpan,
- status awal otomatis `pending`.

## Fase 3: Verifikasi Admin
Tujuan:
- admin bisa memproses pendaftaran relawan.

Output:
- daftar relawan di admin,
- aksi `approve` / `reject` / `nonaktifkan`,
- `tanggal_disetujui` terisi saat approve.

## Fase 4: Status dan Kontak Relawan Aktif
Tujuan:
- publik bisa cek status pendaftaran dan kontak relawan aktif.

Output:
- halaman `status relawan` berjalan (cek via NIK/email),
- halaman `/kontak-relawan` menampilkan relawan `approved`,
- data sensitif tidak tampil ke publik.

## Fase 5: Modul Artikel
Tujuan:
- menyediakan edukasi artikel penanggulangan bencana.

Output:
- admin bisa kelola artikel (draft/publish),
- halaman list dan detail artikel publik aktif,
- artikel publish tampil di landing page.

## Fase 6: Uji dan Rilis
Tujuan:
- memastikan sistem stabil dan siap digunakan.

Output:
- pengujian alur utama selesai,
- validasi privasi dan keamanan lolos,
- siap UAT dan rilis awal.

## Catatan Eksekusi
- Fokus urutan: relawan dulu, artikel setelah alur relawan stabil.
- Setiap fase selesai dulu sebelum lanjut fase berikutnya.
