@extends('layouts.main')

@section('content')
    <section class="card card-glow home-hero">
        <div class="hero-copy">
            <span class="pill">BERANDA - BPBD HSS</span>
            <h1 class="page-title hero-title">
                Sistem Pengajuan Relawan dan Edukasi Penanggulangan Bencana
            </h1>
            <p class="muted hero-subtitle">
                Bersama relawan dan masyarakat, membangun ketangguhan bencana secara terkoordinasi dan berkelanjutan demi Indonesia
                yang lebih siap menghadapi risiko bencana.
            </p>

            <div class="hero-actions">
                <a href="{{ route('relawan.create') }}" class="btn btn-primary">Daftar Relawan</a>
                <a href="{{ route('artikel.index') }}" class="btn btn-outline">Baca Edukasi Bencana</a>
                <a href="{{ route('kontak-relawan.index') }}" class="btn btn-outline">Lihat Kontak Relawan Aktif</a>
            </div>

            <div class="grid-2 section-gap">
                <div class="card stat-card">
                    <div class="muted">Total Pendaftar Relawan</div>
                    <div class="stat-value">{{ $stats['total_relawan'] }}</div>
                </div>
                <div class="card stat-card">
                    <div class="muted">Relawan Disetujui</div>
                    <div class="stat-value">{{ $stats['approved_relawan'] }}</div>
                </div>
            </div>
        </div>

        <div class="hero-slider" id="heroSlider">
            <div class="slider-track">
                <figure class="slide is-active">
                    <img src="{{ asset('images/slider-1.jpg') }}" alt="Foto lapangan kebencanaan 1">
                    <figcaption>Koordinasi lintas pihak saat respons kebencanaan.</figcaption>
                </figure>
                <figure class="slide">
                    <img src="{{ asset('images/slider-2.jpg') }}" alt="Foto lapangan kebencanaan 2">
                    <figcaption>Kesiapsiagaan dan pendampingan warga terdampak.</figcaption>
                </figure>
                <figure class="slide">
                    <img src="{{ asset('images/slider-3.jpg') }}" alt="Foto lapangan kebencanaan 3">
                    <figcaption>Semangat gotong royong relawan di wilayah tugas.</figcaption>
                </figure>
                <figure class="slide">
                    <img src="{{ asset('images/beranda-random.jpg') }}" alt="Foto lapangan kebencanaan random">
                    <figcaption>Foto placeholder random untuk tampilan beranda.</figcaption>
                </figure>
            </div>

            <button type="button" class="slider-nav prev" aria-label="Slide sebelumnya">&lt;</button>
            <button type="button" class="slider-nav next" aria-label="Slide berikutnya">&gt;</button>
            <div class="slider-dots" aria-label="Navigasi slide"></div>
        </div>
    </section>

    <section class="card section-gap">
        <h2 style="margin-top:0;">Tentang BPBD HSS</h2>
        <div class="split-grid">
            <div>
                <p class="muted">
                    BPBD HSS (Badan Penanggulangan Bencana Daerah Kabupaten Hulu Sungai Selatan) adalah unsur pelaksana penanggulangan
                    bencana daerah yang berfokus pada kesiapsiagaan, respons darurat, rehabilitasi, dan rekonstruksi secara terintegrasi
                    di wilayah Kabupaten Hulu Sungai Selatan.
                </p>
                <p class="muted" style="margin-bottom:0;">
                    BPBD HSS bersinergi dengan pemerintah daerah, TNI/Polri, lembaga terkait, organisasi kemanusiaan, dan relawan
                    untuk memastikan kesiapsiagaan, respons cepat, serta pemulihan pascabencana berlangsung efektif dan terkoordinasi.
                </p>
            </div>
            <div class="stack-cards">
                <div class="card info-card">
                    <strong>Fokus Utama</strong>
                    <p class="muted" style="margin:0.4rem 0 0;">Pencegahan risiko, respons cepat, dan pemulihan berkelanjutan.</p>
                </div>
                <div class="card info-card">
                    <strong>Kolaborasi</strong>
                    <p class="muted" style="margin:0.4rem 0 0;">Koordinasi lintas instansi untuk keputusan lebih cepat di lapangan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="card section-gap">
        <h2 style="margin-top:0;">Tahapan Penanggulangan Bencana</h2>
        <div class="grid-3">
            <article class="card stage-card">
                <h3 style="margin-top:0;">1. Pra-Bencana</h3>
                <ul class="list">
                    <li>Mitigasi dan pengurangan risiko</li>
                    <li>Edukasi masyarakat tentang kesiapsiagaan</li>
                    <li>Pemetaan wilayah rawan</li>
                    <li>Penguatan sistem peringatan dini</li>
                </ul>
            </article>
            <article class="card stage-card">
                <h3 style="margin-top:0;">2. Tanggap Darurat</h3>
                <ul class="list">
                    <li>Evakuasi dan penyelamatan korban</li>
                    <li>Distribusi bantuan logistik</li>
                    <li>Pendirian posko pengungsian</li>
                    <li>Koordinasi lintas instansi</li>
                </ul>
            </article>
            <article class="card stage-card">
                <h3 style="margin-top:0;">3. Pascabencana</h3>
                <ul class="list">
                    <li>Rehabilitasi fasilitas umum</li>
                    <li>Rekonstruksi infrastruktur</li>
                    <li>Pemulihan sosial dan ekonomi masyarakat</li>
                </ul>
            </article>
        </div>
    </section>

    <section class="card section-gap">
        <h2 style="margin-top:0;">Peran Relawan</h2>
        <p class="muted">Relawan memainkan peran penting dalam mendukung penanganan bencana di lapangan:</p>
        <div class="role-grid">
            <article class="card role-card">
                <strong>Evakuasi & Penyelamatan</strong>
                <p class="muted">Mendampingi proses penyelamatan bersama tim terkait.</p>
            </article>
            <article class="card role-card">
                <strong>Distribusi Bantuan</strong>
                <p class="muted">Menyalurkan logistik kepada warga terdampak secara terarah.</p>
            </article>
            <article class="card role-card">
                <strong>Pendataan Lapangan</strong>
                <p class="muted">Membantu data korban, kebutuhan, dan kondisi wilayah.</p>
            </article>
            <article class="card role-card">
                <strong>Edukasi Publik</strong>
                <p class="muted">Sosialisasi kesiapsiagaan untuk mengurangi risiko bencana.</p>
            </article>
            <article class="card role-card">
                <strong>Dukungan Posko</strong>
                <p class="muted">Mendukung operasional posko dan alur layanan darurat.</p>
            </article>
        </div>
        <div class="card quote-card">
            Relawan yang telah disetujui admin akan masuk ke daftar relawan aktif dan dapat dihubungi sesuai kebutuhan wilayah tugas.
        </div>
    </section>

    <section class="card section-gap">
        <div class="toolbar">
            <div>
                <h2 style="margin:0;">Edukasi & Artikel Penanggulangan Bencana</h2>
                <p class="muted" style="margin:0.35rem 0 0;">
                    Platform ini menyediakan artikel edukatif yang membantu masyarakat memahami langkah sebelum, saat, dan setelah bencana.
                </p>
            </div>
            <a href="{{ route('artikel.index') }}" class="btn btn-outline">Lihat Semua Artikel</a>
        </div>

        <ul class="list" style="margin-top:0;">
            <li>Mitigasi gempa bumi</li>
            <li>Penanganan banjir dan longsor</li>
            <li>Prosedur evakuasi gunung meletus</li>
            <li>Kesiapsiagaan tsunami</li>
            <li>Tips penyusunan tas siaga bencana</li>
        </ul>

        @if ($latestArtikels->isEmpty())
            <p class="muted" style="margin:0;">Belum ada artikel yang dipublikasikan.</p>
        @else
            <div class="grid-3">
                @foreach ($latestArtikels as $artikel)
                    <article class="card article-card">
                        <img
                            src="{{ $artikel->thumbnail_url }}"
                            alt="Foto artikel {{ $artikel->judul }}"
                            class="article-thumb">
                        <span class="pill">Artikel Publish</span>
                        <h3 style="margin:0; font-size:1.05rem;">{{ $artikel->judul }}</h3>
                        <p class="muted article-date">Upload: {{ $artikel->published_at?->format('d-m-Y H:i') ?? '-' }}</p>
                        <p class="muted" style="margin:0;">{{ \Illuminate\Support\Str::limit($artikel->ringkasan, 140) }}</p>
                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn btn-outline">Baca Artikel</a>
                    </article>
                @endforeach
            </div>
        @endif
    </section>

    <section class="card section-gap">
        <h2 style="margin-top:0;">BPBD Daerah</h2>
        <p class="muted">
            BPBD (Badan Penanggulangan Bencana Daerah) merupakan lembaga di tingkat provinsi dan kabupaten/kota yang bertugas
            melaksanakan penanggulangan bencana di wilayah masing-masing.
        </p>

        <div class="bpbd-grid">
            <div class="card">
                <h3 style="margin-top:0;">BPBD Daerah - Kabupaten Hulu Sungai Selatan</h3>
                <p class="muted" style="margin:0.4rem 0 0;">
                    Jl. Musyawarah, Kandangan Kota, Kec. Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71217
                </p>
                <div style="display:flex; gap:0.6rem; flex-wrap:wrap; margin-top:0.8rem;">
                    <a class="btn btn-outline" href="https://share.google/iRqj6Uvk13i6g32Uf" target="_blank" rel="noopener noreferrer">
                        Lihat di Google Maps
                    </a>
                </div>
                <p class="muted" style="margin:0.9rem 0 0;">Telepon: (isi nomor resmi BPBD setempat)</p>
                <p class="muted" style="margin:0.3rem 0 0;">Email: (isi email resmi BPBD setempat)</p>
            </div>

            <div class="map-wrap">
                <iframe
                    title="Peta BPBD Kabupaten Hulu Sungai Selatan"
                    src="https://maps.google.com/maps?q=Jl.%20Musyawarah,%20Kandangan%20Kota,%20Kabupaten%20Hulu%20Sungai%20Selatan&t=&z=14&ie=UTF8&iwloc=&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <section class="card section-gap">
        <h2 style="margin-top:0;">Relawan Aktif & Kontak</h2>
        <p class="muted">
            Relawan yang telah melalui proses verifikasi oleh admin akan muncul dalam daftar aktif. Data ditampilkan terbatas demi
            menjaga privasi dan keamanan:
        </p>
        <ul class="list">
            <li>Nama relawan</li>
            <li>Area tugas</li>
            <li>Lokasi domisili</li>
            <li>Kontak yang dapat dihubungi secara aman</li>
        </ul>
        <p style="margin-bottom:0;">
            <a href="{{ route('kontak-relawan.index') }}" class="btn btn-outline">Buka Kontak Relawan Aktif</a>
        </p>
    </section>

    <section class="card section-gap">
        <h2 style="margin-top:0;">Komitmen Keamanan Data</h2>
        <div class="check-grid">
            <div class="card check-item">Validasi input pendaftaran</div>
            <div class="card check-item">Verifikasi manual oleh admin</div>
            <div class="card check-item">Penyimpanan dokumen relawan aman</div>
            <div class="card check-item">Perlindungan data pribadi relawan</div>
        </div>
    </section>

    <section class="card section-gap">
        <h2 style="margin-top:0;">Penutup</h2>
        <div class="closing-box">
            <p class="muted" style="margin:0;">
                Dengan adanya sistem ini, partisipasi masyarakat dalam penanggulangan bencana diharapkan meningkat sehingga tercipta
                sistem respons yang cepat, efisien, dan terkoordinasi.
            </p>
            <div class="closing-actions">
                <a href="{{ route('relawan.create') }}" class="btn btn-primary">Gabung Jadi Relawan</a>
                <a href="{{ route('artikel.index') }}" class="btn btn-outline">Pelajari Materi Edukasi</a>
            </div>
        </div>
    </section>

    <style>
        .home-hero {
            display: grid;
            gap: 1.2rem;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: start;
            overflow: hidden;
        }

        .hero-title {
            margin-top: 0.9rem;
            font-size: clamp(1.6rem, 1.3rem + 1vw, 2.3rem);
        }

        .hero-subtitle {
            font-size: 1.02rem;
            line-height: 1.7;
        }

        .hero-actions {
            display: flex;
            gap: 0.65rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .stat-card {
            background: linear-gradient(160deg, var(--surface) 0%, var(--surface-soft) 100%);
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            margin-top: 0.3rem;
            color: var(--brand-strong);
        }

        .hero-slider {
            position: relative;
            border-radius: 14px;
            border: 1px solid var(--line);
            overflow: hidden;
            background: var(--surface);
            box-shadow: var(--card-shadow);
        }

        .slider-track {
            position: relative;
            min-height: 370px;
        }

        .slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.45s ease;
            margin: 0;
            display: grid;
        }

        .slide.is-active {
            opacity: 1;
            z-index: 2;
        }

        .slide img {
            width: 100%;
            height: 100%;
            min-height: 370px;
            object-fit: cover;
            display: block;
        }

        .slide figcaption {
            position: absolute;
            left: 0.7rem;
            right: 0.7rem;
            bottom: 0.7rem;
            padding: 0.52rem 0.65rem;
            border-radius: 10px;
            background: rgba(17, 24, 39, 0.58);
            color: #fff;
            font-size: 0.83rem;
            backdrop-filter: blur(5px);
        }

        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 2rem;
            height: 2rem;
            border: 0;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--brand-strong);
            font-size: 1.25rem;
            font-weight: 700;
            cursor: pointer;
            z-index: 3;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .slider-nav.prev {
            left: 0.55rem;
        }

        .slider-nav.next {
            right: 0.55rem;
        }

        .slider-dots {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0.62rem;
            display: flex;
            justify-content: center;
            gap: 0.34rem;
            z-index: 3;
        }

        .slider-dot {
            width: 0.45rem;
            height: 0.45rem;
            border-radius: 999px;
            border: 0;
            background: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            padding: 0;
        }

        .slider-dot.is-active {
            background: #fb923c;
            transform: scale(1.12);
        }

        .stage-card {
            border: 1px solid var(--line);
            background: linear-gradient(180deg, var(--surface) 0%, var(--surface-soft) 100%);
        }

        .article-card {
            display: grid;
            gap: 0.6rem;
        }

        .article-thumb {
            width: 100%;
            height: 170px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid var(--line);
            display: block;
        }

        .article-date {
            margin: 0;
            font-size: 0.88rem;
        }

        .split-grid {
            display: grid;
            gap: 0.9rem;
            grid-template-columns: 1.3fr 0.7fr;
        }

        .stack-cards {
            display: grid;
            gap: 0.7rem;
        }

        .info-card {
            background: linear-gradient(160deg, var(--surface) 0%, var(--surface-soft) 100%);
            border: 1px dashed var(--line);
        }

        .role-grid {
            display: grid;
            gap: 0.75rem;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        }

        .role-card {
            border: 1px solid var(--border);
            background: linear-gradient(180deg, var(--surface) 0%, var(--surface-soft) 100%);
        }

        .role-card p {
            margin: 0.45rem 0 0;
        }

        .quote-card {
            margin-top: 0.8rem;
            border-left: 4px solid var(--brand);
            background: linear-gradient(160deg, var(--surface-soft) 0%, var(--surface) 100%);
            font-weight: 600;
        }

        .check-grid {
            display: grid;
            gap: 0.75rem;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .check-item {
            position: relative;
            padding-left: 2.1rem;
            min-height: 74px;
            display: flex;
            align-items: center;
            font-weight: 600;
            background: linear-gradient(160deg, var(--surface) 0%, var(--surface-soft) 100%);
        }

        .check-item::before {
            content: "OK";
            position: absolute;
            left: 0.72rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            border-radius: 999px;
            background: var(--brand);
            color: #fff;
            font-size: 0.56rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .closing-box {
            display: grid;
            gap: 0.85rem;
            padding: 1rem;
            border-radius: 14px;
            background: linear-gradient(120deg, var(--surface-soft) 0%, var(--surface) 100%);
            border: 1px solid var(--line);
        }

        .closing-actions {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .bpbd-grid {
            display: grid;
            gap: 0.9rem;
            grid-template-columns: 1fr 1fr;
            align-items: stretch;
        }

        .map-wrap {
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid var(--line);
            min-height: 350px;
            box-shadow: var(--card-shadow);
        }

        .map-wrap iframe {
            width: 100%;
            height: 100%;
            min-height: 350px;
            border: 0;
            display: block;
        }

        .list {
            margin: 0.45rem 0 0;
            padding-left: 1.05rem;
            display: grid;
            gap: 0.34rem;
            color: var(--ink);
        }

        @media (prefers-color-scheme: dark) {
            .slide figcaption {
                background: rgba(2, 6, 23, 0.72);
                color: #e5e7eb;
            }

            .slider-nav {
                background: rgba(17, 24, 39, 0.9);
                border: 1px solid var(--border);
                color: var(--ink);
            }

            .slider-dot {
                background: rgba(148, 163, 184, 0.55);
            }

            .slider-dot.is-active {
                background: var(--brand);
            }
        }

        @media (max-width: 980px) {
            .home-hero {
                grid-template-columns: 1fr;
            }

            .split-grid {
                grid-template-columns: 1fr;
            }

            .slider-track,
            .slide img {
                min-height: 300px;
            }

            .bpbd-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <script>
        (function () {
            const slider = document.getElementById('heroSlider');
            if (!slider) return;

            const slides = Array.from(slider.querySelectorAll('.slide'));
            const dotContainer = slider.querySelector('.slider-dots');
            const prevBtn = slider.querySelector('.slider-nav.prev');
            const nextBtn = slider.querySelector('.slider-nav.next');
            let index = 0;
            let timer = null;

            const dots = slides.map((_, i) => {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'slider-dot';
                dot.setAttribute('aria-label', `Slide ${i + 1}`);
                dot.addEventListener('click', () => goTo(i));
                dotContainer.appendChild(dot);
                return dot;
            });

            function render() {
                slides.forEach((slide, i) => slide.classList.toggle('is-active', i === index));
                dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));
            }

            function goTo(i) {
                index = (i + slides.length) % slides.length;
                render();
            }

            function next() {
                goTo(index + 1);
            }

            function start() {
                stop();
                timer = setInterval(next, 4500);
            }

            function stop() {
                if (timer) clearInterval(timer);
            }

            prevBtn.addEventListener('click', () => goTo(index - 1));
            nextBtn.addEventListener('click', next);
            slider.addEventListener('mouseenter', stop);
            slider.addEventListener('mouseleave', start);

            render();
            start();
        })();
    </script>
@endsection
