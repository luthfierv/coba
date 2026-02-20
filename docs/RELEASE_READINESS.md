# Release Readiness BNPB v0.1

## Status Umum
- Fase 1-5 selesai.
- Fase 6 (uji dan rilis) mencakup hardening keamanan, pengujian alur utama, dan checklist UAT.

## Checklist Teknis
1. Konfigurasi environment
- `APP_ENV=production`
- `APP_DEBUG=false`
- kredensial database produksi sudah benar.

2. Perintah deploy minimum
- `composer install --no-dev --optimize-autoloader`
- `php artisan migrate --force`
- `php artisan config:cache`
- `php artisan route:cache`
- `php artisan view:cache`

3. Verifikasi pasca deploy
- Login admin berhasil.
- Pendaftaran relawan + upload multi-file berjalan.
- Verifikasi relawan (approve/reject/nonaktifkan) berjalan.
- Kontak relawan aktif hanya menampilkan data publik aman.
- Modul artikel admin/public berjalan.

4. Validasi keamanan
- Endpoint sensitif memiliki rate limit:
  - `POST /admin/login`
  - `POST /daftar-relawan`
  - `POST /status-relawan`
- Akses admin diproteksi middleware `auth` + `admin`.
- Audit perubahan relawan aktif dan tercatat.

## Go/No-Go
- GO jika seluruh test otomatis lulus dan seluruh skenario UAT lulus.
- NO-GO jika ada kebocoran data sensitif atau error kritikal pada alur relawan/artikel.
