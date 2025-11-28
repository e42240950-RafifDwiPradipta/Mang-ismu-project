@extends('layouts.site') 
@section('title', 'Daftar Menu - Mang Ismu')

@section('content')

    {{-- SECTION MAKANAN --}}
    <section class="menu-category-section" id="menu-makanan">
        <div class="container">
            <h2 class="section-title">Makanan</h2>
            <div class="menu-grid">
                
                @forelse ($makanan_items as $item)
                    @include('components.menu-card', [
                        'gambar' => asset('storage/' . $item->gambar_path),
                        'judul' => $item->nama_produk,
                        'harga' => $item->harga,  // <--- TAMBAHAN: Kirim data harga
                        'deskripsi' => $item->deskripsi
                    ])
                @empty
                    <p>Belum ada menu makanan untuk saat ini.</p>
                @endforelse
                
            </div>
        </div>
    </section>

    {{-- SECTION MINUMAN --}}
    <section class="menu-category-section" id="menu-minuman">
        <div class="container">
            <h2 class="section-title">Minuman</h2>
            <div class="menu-grid">
                
                @forelse ($minuman_items as $item)
                    @include('components.menu-card', [
                        'gambar' => asset('storage/' . $item->gambar_path),
                        'judul' => $item->nama_produk,
                        'harga' => $item->harga,  // <--- TAMBAHAN
                        'deskripsi' => $item->deskripsi
                    ])
                @empty
                    <p>Belum ada menu minuman untuk saat ini.</p>
                @endforelse
                
            </div>
        </div>
    </section>

    {{-- SECTION CAMILAN --}}
    <section class="menu-category-section" id="menu-camilan">
        <div class="container">
            <h2 class="section-title">Camilan</h2>
            <div class="menu-grid">
                
                @forelse ($camilan_items as $item)
                    @include('components.menu-card', [
                        'gambar' => asset('storage/' . $item->gambar_path),
                        'judul' => $item->nama_produk,
                        'harga' => $item->harga,  // <--- TAMBAHAN
                        'deskripsi' => $item->deskripsi
                    ])
                @empty
                    <p>Belum ada menu camilan untuk saat ini.</p>
                @endforelse
                
            </div>
        </div>
    </section>

@endsection