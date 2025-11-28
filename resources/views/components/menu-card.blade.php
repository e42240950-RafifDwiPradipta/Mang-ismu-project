<div class="menu-card">
    {{-- Wrapper Gambar (Untuk efek zoom) --}}
    <div class="menu-img-wrapper">
        <img src="{{ $gambar }}" alt="{{ $judul }}">
    </div>
    
    <div class="menu-card-content">
        <div class="menu-text-body">
            <h3>{{ $judul }}</h3>
            <p class="menu-desc">{{ Str::limit($deskripsi, 80) }}</p> {{-- Batasi teks biar rapi --}}
        </div>
        
        {{-- Footer Kartu: HANYA HARGA (Tanpa Tombol Pesan) --}}
        @if(isset($harga) && $harga > 0)
            <div class="menu-card-footer-simple">
                <span class="price-value-simple">Rp {{ number_format($harga, 0, ',', '.') }}</span>
            </div>
        @endif
    </div>
</div>