# UAT Checklist BNPB v0.1

## Tujuan
Dokumen ini menjadi daftar uji penerimaan pengguna (UAT) untuk memastikan alur utama aplikasi berjalan sebelum rilis awal.

## Lingkup Uji
- Alur publik: landing, pendaftaran relawan, cek status, kontak relawan aktif, artikel.
- Alur admin: login, verifikasi relawan, pengaturan kontak publik relawan, manajemen artikel.
- Validasi privasi: data sensitif tidak muncul di endpoint publik.

## Skenario UAT
1. Pendaftaran relawan baru berhasil dan status awal `pending`.
2. Admin melihat data relawan dan dokumen pendukung.
3. Admin `approve` relawan dan `tanggal_disetujui` terisi.
4. Admin mengaktifkan `kontak publik` untuk relawan approved aktif.
5. Publik cek status relawan via NIK/email dan mendapat status terbaru.
6. Halaman `/kontak-relawan` hanya menampilkan relawan approved + active + public-contact.
7. Data sensitif (NIK, alamat lengkap) tidak tampil di halaman kontak publik.
8. Admin dapat `reject` dan `nonaktifkan` relawan.
9. Audit log perubahan relawan tampil di detail admin.
10. Admin dapat buat artikel draft dan publish.
11. Artikel publish tampil di landing page dan halaman publik artikel.
12. Artikel draft tidak tampil di publik.

## Kriteria Lulus
- Semua skenario berhasil tanpa error 500.
- Semua aturan privasi terpenuhi.
- Semua route admin tidak bisa diakses user non-admin.
- Tidak ada regresi pada test otomatis (`php artisan test` harus lulus).

## Catatan Eksekusi
- Gunakan akun admin seeded:
  - email: `admin@bnpb.local`
  - password: `admin12345`
- Jalankan pengujian pada environment staging sebelum produksi.
