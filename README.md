# BPBD HSS

Aplikasi web informasi penanggulangan bencana berbasis Laravel dengan fokus pada:

- edukasi publik melalui artikel bencana,
- pendaftaran relawan beserta dokumen,
- verifikasi relawan oleh admin,
- publikasi kontak relawan aktif,
- audit log aktivitas admin.

## Fitur Utama

### Publik

- Landing page informatif (tentang BPBD HSS, alur bencana, relawan, BPBD).
- List dan detail artikel penanggulangan bencana (hanya `publish`).
- Form pendaftaran relawan + upload multi dokumen.
- Cek status pendaftaran relawan via NIK atau email.
- Halaman kontak relawan aktif publik.

### Admin

- Login admin dan dashboard ringkasan relawan.
- Verifikasi relawan: `approve`, `reject`, `nonaktifkan`.
- Saat relawan di-approve, kontak relawan otomatis dipublikasikan.
- Manajemen artikel: create, edit, draft/publish, thumbnail, delete.
- Halaman log aktivitas admin untuk riwayat perubahan status relawan.

## Teknologi

- PHP `^8.2`
- Laravel `^12.0`
- MySQL
- Blade templating
- PHPUnit untuk feature test

## Kebutuhan Sistem

- PHP 8.2+
- Composer
- MySQL/MariaDB
- Node.js dan npm (opsional, jika ingin build asset Vite)
- XAMPP/Laragon atau stack lokal serupa

## Instalasi

1. Clone repository lalu masuk ke folder project.
2. Install dependency PHP.
3. Siapkan file environment.
4. Generate app key.
5. Atur konfigurasi database di `.env`.
6. Jalankan migrasi dan seeding.
7. Jalankan server.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Untuk PowerShell Windows, ganti `cp` dengan:

```powershell
Copy-Item .env.example .env
```

Jika memakai frontend dev server:

```bash
npm install
npm run dev
```

## Konfigurasi Environment Minimum

Contoh bagian `.env`:

```env
APP_NAME="BPBD HSS"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bnpb
DB_USERNAME=root
DB_PASSWORD=root

FILESYSTEM_DISK=local
```

## Seeder dan Data Demo

Seeder utama (`DatabaseSeeder`) akan mengisi:

- akun admin default,
- artikel bencana (7 tema + foto + tanggal publish),
- data relawan dengan berbagai status,
- dokumen relawan dummy,
- log status relawan.

Perintah:

```bash
php artisan db:seed
```

Akun admin default:

- Email: `admin@bnpb.local`
- Password: `admin12345`

## Alur Uji Cepat

1. Login admin di `/admin` menggunakan akun default.
2. Buka `/admin/relawans` untuk verifikasi data relawan.
3. Approve relawan, lalu cek bahwa kontaknya muncul di `/kontak-relawan`.
4. Buka `/admin/logs` untuk melihat audit aktivitas admin.
5. Buka `/artikel` untuk memastikan artikel publish tampil dengan foto dan tanggal upload.

## Pengujian

Jalankan seluruh test:

```bash
php artisan test
```

Test suite mencakup:

- auth admin,
- verifikasi relawan,
- status dan kontak publik,
- modul artikel,
- main flow readiness,
- keamanan route,
- halaman log aktivitas admin.

## Route Penting

### Public

- `GET /`
- `GET /artikel`
- `GET /artikel/{slug}`
- `GET /daftar-relawan`
- `POST /daftar-relawan`
- `GET /status-relawan`
- `POST /status-relawan`
- `GET /kontak-relawan`

### Admin

- `GET /admin`
- `POST /admin/login`
- `GET /admin/dashboard`
- `GET /admin/relawans`
- `GET /admin/relawans/{relawan}`
- `PATCH /admin/relawans/{relawan}/approve`
- `PATCH /admin/relawans/{relawan}/reject`
- `PATCH /admin/relawans/{relawan}/nonaktifkan`
- `PATCH /admin/relawans/{relawan}/publish-contact`
- `PATCH /admin/relawans/{relawan}/hide-contact`
- `GET /admin/logs`
- `Resource /admin/artikels`
- `POST /admin/logout`

## Struktur Folder Singkat

- `app/Http/Controllers` logika controller publik dan admin.
- `app/Http/Requests` validasi request.
- `app/Models` model Eloquent (`Relawan`, `Artikel`, `RelawanFile`, `RelawanStatusLog`, `User`).
- `database/migrations` skema tabel.
- `database/seeders` data awal aplikasi.
- `resources/views` tampilan Blade publik dan admin.
- `tests/Feature` test skenario utama aplikasi.

## Catatan Keamanan dan Privasi

- Endpoint sensitif diberi throttle middleware.
- Halaman admin dilindungi middleware `auth` + `admin`.
- Data sensitif (NIK, alamat lengkap, file dokumen) tidak ditampilkan di halaman kontak publik.
- Nomor HP pada kontak publik ditampilkan dalam bentuk tersamarkan.

## Dokumen Tambahan

- `guide.md` untuk panduan sistem lengkap.
- `rencana-pengembangan.md` untuk roadmap fase pengembangan.
- `docs/` untuk checklist UAT dan release readiness.
