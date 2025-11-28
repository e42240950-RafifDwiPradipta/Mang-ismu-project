@extends('layouts.site')

@section('title', 'Beranda - Mang Ismu')

@section('content')

    {{-- ================================================= --}}
    {{-- BAGIAN 1: HERO CONTAINER (SLIDER & JUDUL)         --}}
    {{-- ================================================= --}}
    <section id="beranda" class="hero-container">
        
        <div class="hero-slider-background splide" aria-label="Galeri Makanan Mang Ismu">
            <div class="splide__track">
                <ul class="splide__list">
                    
                    @forelse ($sliders as $slider)
                        <li class="splide__slide">
                            <img src="{{ asset('storage/' . $slider->gambar_path) }}" alt="Slider Mang Ismu" class="hero-slide-image">
                        </li>
                    @empty
                        <li class="splide__slide">
                            <img src="{{ asset('assets/images/hero-1.jpg') }}" alt="Default Slider" class="hero-slide-image">
                        </li>
                    @endforelse
                    
                </ul>
            </div>
        </div>

        <div class="hero-text-content">
            <div class="container">
                <h1>JAGOnya KULINER</h1>
                <p>Cita Rasa Otentik Khas Bondowoso.</p>
                <a href="#tentang-kami" class="btn btn-primary hero-btn">Lihat Selengkapnya</a>
            </div>
        </div>

    </section>

    {{-- ================================================= --}}
    {{-- BAGIAN 2: TENTANG KAMI (ABOUT & GALERI DINAMIS)   --}}
    {{-- ================================================= --}}
    <section id="tentang-kami" class="about-section">
        <img src="{{ asset('assets/images/Logo menu.svg') }}" alt="Logo Mang Ismu" class="about-logo">
        <h2 class="section-title">MANG ISMU</h2>
        <p class="about-description">
            Mang Ismu bukan sekadar nama, tapi sebuah cerita tentang cinta pada kuliner asli Bondowoso. Berawal dari dapur rumahan sederhana, Mang Ismu memiliki satu misi: membawa cita rasa otentik yang 'ngangeni' ke meja Anda.
        </p>
        
        <div class="about-gallery"> 
            @forelse($galleries as $gallery)
                <img src="{{ asset('storage/' . $gallery->gambar_path) }}" 
                     alt="{{ $gallery->judul ?? 'Galeri Mang Ismu' }}"
                     class="about-gallery-img"> 
            @empty
                <img src="{{ asset('assets/images/makanan.png') }}" alt="Default Makanan">
                <img src="{{ asset('assets/images/minuman.png') }}" alt="Default Minuman">
                <img src="{{ asset('assets/images/camilan.png') }}" alt="Default Camilan">
            @endforelse
        </div>
        
        <a href="{{ route('menu') }}" class="btn btn-primary">Menu Selengkapnya</a>
    </section>

    {{-- ================================================= --}}
    {{-- BAGIAN 3: CERITA (STORY)                          --}}
    {{-- ================================================= --}}
    <section id="cerita" class="story-section">
        <div class="container story-container">
            <div class="story-left">
                <img src="{{ asset('assets/images/Logo menu.svg') }}" alt="Cerita di Balik Mang Ismu" class="story-image">
            </div>
            <div class="story-right">
                <h2 class="section-title">Cerita di Balik Sang Jagoan Kuliner</h2>
                <h3 class="story-subtitle">Kenali Lebih Dekat Cita Rasa Otentik Bondowoso</h3>
                <p>
                    "Kami percaya bahwa makanan enak berawal dari bahan baku terbaik dan resep yang tulus. Di sinilah kami, 'Sang Jagoan Kuliner', hadir untuk memastikan setiap hidangan mulai dari donat empuk, kopi pilihan, hingga Nasi Telur Gimbal dibuat dengan sepenuh hati."
                </p>
            </div>
        </div>
    </section>

    {{-- ================================================= --}}
    {{-- BAGIAN 4: NILAI (VALUES)                          --}}
    {{-- ================================================= --}}
    <section id="nilai" class="values-section">
        <div class="container values-container">

            @forelse ($values as $value)
                <div class="value-card" data-target="popup-{{ $value->id }}">
                    
                    {{-- ikon / gambar putih melingkar --}}
                    <div class="value-icon-wrapper">
                        @if (!empty($value->image_path))
                            <img src="{{ asset('storage/' . $value->image_path) }}" alt="{{ $value->title }}">
                        @elseif (!empty($value->icon))
                            <i class="{{ $value->icon }} value-fa-icon" aria-hidden="true"></i>
                        @else
                            <i class="fas fa-star value-fa-icon"></i>
                        @endif
                    </div>

                    <h3>{{ $value->title }}</h3>
                    <p>{{ Str::limit($value->short_description, 120) }}</p>
                </div>
            @empty
                <div class="value-card">
                    <div class="value-icon-wrapper">
                        <i class="fas fa-exclamation-circle value-fa-icon"></i>
                    </div>
                    <h3>Data Belum Tersedia</h3>
                    <p>Silakan tambahkan data nilai melalui halaman admin.</p>
                </div>
            @endforelse

        </div>
    </section>


    {{-- ================================================= --}}
    {{-- BAGIAN 5: KONTAK & CABANG (LAYOUT PREMIUM)        --}}
    {{-- ================================================= --}}
    <section id="kontak" class="info-section">
        
        {{-- KOLOM KIRI: LOKASI --}}
        <div class="info-left">
            {{-- Judul Kiri --}}
            <h2 class="section-title-kontak">Lokasi Outlet</h2>
            
            @forelse ($branches as $branch)
                <div class="cabang-card">
                    <h3>{{ $branch->name }}</h3>
                    <div class="card-content">
                        <span class="icon">🗺️</span>
                        <p>{{ $branch->address }}</p>
                    </div>
                </div>
            @empty
                <div class="cabang-card">
                    <h3>Data Belum Tersedia</h3>
                    <p>Silakan input data melalui admin.</p>
                </div>
            @endforelse

            <a href="{{ url('/lokasi') }}" class="btn-full-bottom">
                Lihat Peta Lengkap
            </a>
        </div>
        
       {{-- KOLOM KANAN: INFO --}}
        <div class="info-right">
            {{-- Judul Kanan --}}
            <h2 class="section-title-kontak"> Informasi & Pemesanan</h2> 
            
            {{-- Kartu Jam Operasional --}}
            <div class="info-box-kontak">
                <h3>Jam Operasional</h3>
                <div class="card-content">
                    <span class="icon"></span>
                    <p>Setiap Hari: <strong>10:00 - 22:00 WIB</strong></p>
                </div>
            </div>
            
            {{-- Kartu Pesan Sekarang --}}
            <div class="info-box-kontak">
                <h3>Pesan Sekarang</h3>
                
                {{-- Tombol WhatsApp --}}
                <a href="https://wa.me/6285732651979" target="_blank" class="btn-full-bottom mb-3">
                    Hubungi via WhatsApp
                </a>

               {{-- TOMBOL GRABFOOD (UPDATE BARU) --}}
              {{-- Jangan lupa ganti '#' dengan Link Restoran GrabFood Anda --}}
             <a href="https://food.grab.com/id/id/restaurant/cilok-mang-ismu-dabasah-delivery/6-C651AZBJRYJHTT?" target="_blank" class="btn-grab">
              {{-- Ikon Motor (SVG) --}}
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;">
        <path d="M19 13V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M22 12L20.3931 7.17919C20.0343 6.10284 19.0255 5.36887 17.8911 5.36887H6.10888C4.97451 5.36887 3.9657 6.10284 3.60689 7.17919L2 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M12 5V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    
    <span>Pesan via GrabFood</span>
</a>
        </div>
    </section>
    
    {{-- ================================================= --}}
    {{-- BAGIAN 6: POPUPS (MODALS) DINAMIS                 --}}
    {{-- ================================================= --}}

    @foreach ($values as $value)
        <div id="popup-{{ $value->id }}" class="popup-overlay">
            <div class="popup-content">
                <span class="popup-close">&times;</span>
                
                <h2>{{ $value->title }}</h2>

                <div class="popup-img-wrapper">
                    @if ($value->image_path)
                        <img src="{{ asset('storage/' . $value->image_path) }}" 
                             alt="{{ $value->title }}" 
                             class="popup-custom-img">
                    @elseif ($value->icon)
                        <i class="{{ $value->icon }} popup-fa-icon"></i>
                    @endif
                </div>

                <p>{{ $value->detail_description ?? $value->short_description }}</p>
            </div>
        </div>
    @endforeach

@endsection