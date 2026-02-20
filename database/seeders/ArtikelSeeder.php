<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    /**
     * Seed the application's database with published disaster education articles.
     */
    public function run(): void
    {
        $artikels = [
            [
                'judul' => 'Cara Menghadapi Banjir di Wilayah Permukiman',
                'ringkasan' => 'Panduan mengenali tanda banjir, langkah persiapan, tindakan darurat, dan pemulihan setelah banjir di lingkungan permukiman.',
                'konten' => "Banjir di wilayah permukiman umumnya dipicu curah hujan tinggi, saluran drainase tersumbat, dan alih fungsi lahan.\n\nTanda potensi banjir:\n- Hujan intensitas tinggi lebih dari 2 jam.\n- Ketinggian air sungai naik cepat.\n- Saluran air lingkungan meluap.\n\nPersiapan sebelum banjir:\n- Simpan dokumen penting dalam wadah tahan air.\n- Pindahkan barang elektronik ke tempat lebih tinggi.\n- Siapkan tas siaga, senter, dan radio.\n\nTindakan saat banjir:\n- Matikan listrik utama bila air mulai masuk rumah.\n- Evakuasi anak, lansia, dan difabel lebih dahulu.\n- Ikuti arahan petugas dan menuju titik aman.\n\nLangkah setelah banjir:\n- Bersihkan rumah dengan alat pelindung.\n- Cek instalasi listrik sebelum digunakan kembali.\n- Waspadai penyakit pascabanjir seperti diare dan leptospirosis.",
                'thumbnail_path' => 'images/slider-1.jpg',
                'published_at' => CarbonImmutable::parse('2026-01-24 08:15:00'),
            ],
            [
                'judul' => 'Kesiapsiagaan Menghadapi Musim Hujan dan Tanah Longsor',
                'ringkasan' => 'Cara memahami penyebab longsor, mengenali area rawan, pencegahan sederhana, dan prosedur evakuasi yang aman.',
                'konten' => "Tanah longsor sering terjadi saat hujan berkepanjangan pada lereng curam dengan kondisi tanah labil.\n\nPenyebab longsor:\n- Penebangan pohon tanpa konservasi.\n- Drainase lereng buruk.\n- Getaran dari aktivitas tertentu di lereng.\n\nCiri wilayah rawan:\n- Retakan tanah memanjang.\n- Muncul rembesan air baru di lereng.\n- Pohon atau tiang miring mendadak.\n\nPencegahan sederhana:\n- Menanam vegetasi berakar kuat.\n- Tidak menambah beban bangunan di bibir lereng.\n- Membuat saluran pembuangan air.\n\nEvakuasi aman:\n- Evakuasi tegak lurus dari arah luncuran.\n- Hindari lembah dan aliran material.\n- Bawa dokumen penting serta obat pribadi.",
                'thumbnail_path' => 'images/slider-2.jpg',
                'published_at' => CarbonImmutable::parse('2026-01-27 09:20:00'),
            ],
            [
                'judul' => 'Pentingnya Tas Siaga Bencana untuk Setiap Keluarga',
                'ringkasan' => 'Tas siaga membantu keluarga merespons bencana lebih cepat dengan perlengkapan darurat yang sudah siap pakai.',
                'konten' => "Tas siaga bencana adalah tas darurat yang berisi kebutuhan dasar minimal untuk bertahan 72 jam pertama.\n\nIsi tas siaga standar:\n- Air minum dan makanan siap konsumsi.\n- Kotak P3K dan obat rutin keluarga.\n- Senter, baterai cadangan, peluit, dan power bank.\n- Masker, selimut, pakaian ganti, dan perlengkapan sanitasi.\n- Salinan dokumen penting serta uang tunai secukupnya.\n\nKenapa harus disiapkan sebelum bencana:\n- Mengurangi kepanikan saat evakuasi.\n- Mempercepat perpindahan ke titik aman.\n- Menjamin kebutuhan dasar tetap terpenuhi.\n\nTips penyimpanan:\n- Letakkan di lokasi mudah dijangkau.\n- Cek masa berlaku makanan/obat tiap 3 bulan.\n- Sesuaikan isi dengan kebutuhan bayi, lansia, atau difabel.",
                'thumbnail_path' => 'images/slider-3.jpg',
                'published_at' => CarbonImmutable::parse('2026-01-30 10:05:00'),
            ],
            [
                'judul' => 'Peran Relawan dalam Penanggulangan Bencana',
                'ringkasan' => 'Relawan menjadi elemen penting dalam evakuasi, distribusi bantuan, pendataan, dan edukasi publik secara terkoordinasi.',
                'konten' => "Relawan berperan memperkuat kapasitas penanganan bencana di lapangan bersama BPBD, TNI/Polri, dan tenaga kesehatan.\n\nTugas relawan di lapangan:\n- Membantu evakuasi kelompok rentan.\n- Menyalurkan logistik tepat sasaran.\n- Mendukung operasional posko dan pendataan.\n\nEtika relawan:\n- Mengutamakan keselamatan korban dan tim.\n- Menjaga komunikasi sopan dan empatik.\n- Tidak menyebar informasi belum terverifikasi.\n\nKoordinasi dengan petugas:\n- Mengikuti komando posko resmi.\n- Melapor berkala terkait kondisi lapangan.\n- Menggunakan jalur komunikasi yang disepakati.\n\nTanggung jawab keselamatan:\n- Menggunakan APD sesuai risiko.\n- Tidak bekerja sendirian di area berbahaya.\n- Istirahat cukup agar tetap efektif.",
                'thumbnail_path' => 'images/beranda-random.jpg',
                'published_at' => CarbonImmutable::parse('2026-02-02 08:40:00'),
            ],
            [
                'judul' => 'Prosedur Evakuasi Saat Terjadi Bencana',
                'ringkasan' => 'Langkah evakuasi yang benar dimulai dari mengenali sinyal darurat, memahami jalur, hingga berkumpul di titik aman.',
                'konten' => "Keberhasilan evakuasi bergantung pada kecepatan, ketertiban, dan kepatuhan terhadap arahan resmi.\n\nMengenali sinyal darurat:\n- Sirene, pengumuman petugas, atau peringatan dini.\n- Notifikasi resmi dari kanal pemerintah/otoritas.\n\nJalur evakuasi:\n- Pahami rute terdekat dari rumah, sekolah, dan kantor.\n- Pastikan jalur tidak terhalang saat musim hujan.\n\nTitik kumpul:\n- Pilih area terbuka yang aman dari risiko lanjutan.\n- Lakukan pendataan anggota keluarga segera setelah tiba.\n\nHal yang tidak boleh dilakukan:\n- Kembali ke area bahaya untuk mengambil barang.\n- Menyebarkan rumor yang memicu kepanikan.\n- Menghalangi jalur evakuasi kendaraan darurat.",
                'thumbnail_path' => 'images/slider-1.jpg',
                'published_at' => CarbonImmutable::parse('2026-02-05 11:10:00'),
            ],
            [
                'judul' => 'Potensi Bencana di Kabupaten Hulu Sungai Selatan',
                'ringkasan' => 'Mengenali jenis bencana yang sering terjadi di Hulu Sungai Selatan serta upaya mitigasi bersama BPBD dan masyarakat.',
                'konten' => "Kabupaten Hulu Sungai Selatan memiliki potensi bencana hidrometeorologi yang perlu diantisipasi bersama.\n\nJenis bencana yang sering terjadi:\n- Banjir musiman di area dataran rendah.\n- Tanah longsor pada wilayah lereng.\n- Angin kencang dan cuaca ekstrem lokal.\n\nWilayah rawan:\n- Area bantaran sungai dan drainase terbatas.\n- Permukiman dekat lereng dan tebing curam.\n\nUpaya BPBD daerah:\n- Sosialisasi kesiapsiagaan berbasis desa/kelurahan.\n- Penguatan sistem peringatan dini lokal.\n- Simulasi evakuasi berkala lintas unsur.\n\nPeran masyarakat lokal:\n- Menjaga kebersihan saluran air.\n- Mengikuti pelatihan kebencanaan.\n- Aktif melapor jika ada tanda bahaya.",
                'thumbnail_path' => 'images/slider-2.jpg',
                'published_at' => CarbonImmutable::parse('2026-02-09 09:00:00'),
            ],
            [
                'judul' => 'Langkah Aman Saat Terjadi Kebakaran Permukiman',
                'ringkasan' => 'Panduan pencegahan kebakaran rumah, langkah evakuasi aman, dan penanganan awal sebelum petugas tiba.',
                'konten' => "Kebakaran permukiman sering berawal dari kelalaian penggunaan listrik, kompor, atau api terbuka.\n\nPenyebab umum kebakaran:\n- Korsleting instalasi listrik.\n- Kebocoran gas LPG.\n- Pembakaran sampah tanpa pengawasan.\n\nCara pencegahan:\n- Periksa kabel dan stop kontak berkala.\n- Gunakan regulator dan selang gas berstandar.\n- Sediakan APAR di area strategis.\n\nEvakuasi aman:\n- Segera keluar melalui jalur terdekat.\n- Jangan gunakan lift pada bangunan bertingkat.\n- Bantu kelompok rentan menuju titik kumpul.\n\nPenanganan awal:\n- Putus aliran listrik jika memungkinkan.\n- Gunakan APAR untuk api kecil.\n- Hubungi damkar dan petugas setempat sesegera mungkin.",
                'thumbnail_path' => 'images/slider-3.jpg',
                'published_at' => CarbonImmutable::parse('2026-02-13 14:30:00'),
            ],
        ];

        foreach ($artikels as $artikel) {
            $slug = Str::slug($artikel['judul']);

            Artikel::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'judul' => $artikel['judul'],
                    'slug' => $slug,
                    'ringkasan' => $artikel['ringkasan'],
                    'konten' => $artikel['konten'],
                    'thumbnail_path' => $artikel['thumbnail_path'],
                    'status' => 'publish',
                    'published_at' => $artikel['published_at'],
                ]
            );
        }
    }
}
