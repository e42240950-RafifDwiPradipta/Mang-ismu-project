@extends('layouts.site')

@section('title', 'Lokasi Kami - Mang Ismu')

@section('content')

{{-- Wrapper utama dengan class --}}
<div class="location-page-wrapper">
    <div class="location-container">
        
        <h1 class="page-title">Temukan Mang Ismu Terdekat</h1>

        @forelse($locations as $location)
            
            {{-- ROW ZIG-ZAG: Class 'reverse' ditambahkan otomatis jika urutan genap --}}
            <div class="zig-zag-row {{ $loop->even ? 'reverse' : '' }}">
                
                {{-- KOLOM GAMBAR --}}
                <div class="col-image">
                    <img src="{{ asset('storage/' . $location->image_path) }}" 
                         onerror="this.src='https://placehold.co/600x400?text=Foto+Cabang'" 
                         class="location-img" 
                         alt="{{ $location->name }}">
                </div>

                {{-- KOLOM TEKS --}}
                <div class="col-text">
                    <h2 class="loc-name">{{ $location->name }}</h2>
                    <p class="loc-desc">{{ $location->description }}</p>
                    
                    <ul class="info-list">
                        <li>
                            <span class="icon">📍</span> 
                            <div><strong>Alamat:</strong><br>{{ $location->address }}</div>
                        </li>
                        <li>
                            <span class="icon">⏰</span> 
                            <div><strong>Jam Buka:</strong><br>{{ $location->opening_hours }}</div>
                        </li>
                    </ul>

                    <a href="{{ $location->map_link }}" target="_blank" class="btn-maps">
                        Buka di Google Maps
                    </a>
                </div>

            </div>

            {{-- Divider --}}
            @if(!$loop->last) <div class="divider"></div> @endif

        @empty
            <div class="empty-state">
                <h3>Belum ada data lokasi yang diinput.</h3>
            </div>
        @endforelse

    </div>
</div>
@endsection