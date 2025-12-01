<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#8b0000] leading-tight">
            {{ __('Dashboard Admin Mang Ismu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Kartu Sambutan --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border-l-4 border-[#8b0000]">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold text-gray-800">Selamat Datang, Admin! 👋</h3>
                    <p class="text-gray-600 mt-2">Anda sudah login. Silakan kelola konten website Mang Ismu dari panel di bawah ini.</p>
                </div>
            </div>

            {{-- Grid Menu Cepat (Shortcut) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- KARTU 1: KELOLA MENU (Utama) --}}
                <a href="{{ route('admin.menu.index') }}" class="block transform transition hover:scale-105 duration-300 group">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-yellow-400 p-6 h-full hover:shadow-md">
                        <div class="flex items-start space-x-4">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 group-hover:bg-yellow-200 transition">
                                {{-- Ikon Makanan (Garpu & Sendok) --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-1">Kelola Menu</h4>
                                <p class="text-sm text-gray-500">Tambah, Edit, atau Hapus daftar makanan & minuman.</p>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- KARTU 2: KELOLA SLIDER (BERANDA) --}}
                {{-- Pastikan route 'admin.sliders.index' ada. Jika belum, ganti href="#" --}}
                <a href="{{ Route::has('admin.slider.index') ? route('admin.slider.index') : '#' }}" class="block transform transition hover:scale-105 duration-300 group">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-green-500 p-6 h-full hover:shadow-md">
                        <div class="flex items-start space-x-4">
                            <div class="p-3 rounded-full bg-green-100 text-green-600 group-hover:bg-green-200 transition">
                                {{-- Ikon Gambar --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-1">Slider Beranda</h4>
                                <p class="text-sm text-gray-500">Ubah gambar banner promo di halaman utama.</p>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- KARTU 3: KELOLA GALERI (ABOUT) --}}
                <a href="{{ Route::has('admin.gallery.index') ? route('admin.gallery.index') : '#' }}" class="block transform transition hover:scale-105 duration-300 group">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-orange-500 p-6 h-full hover:shadow-md">
                        <div class="flex items-start space-x-4">
                            <div class="p-3 rounded-full bg-orange-100 text-orange-600 group-hover:bg-orange-200 transition">
                                {{-- Ikon Foto --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-1">Galeri Foto</h4>
                                <p class="text-sm text-gray-500">Foto kegiatan dan suasana outlet.</p>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- KARTU 4: KELOLA VALUES --}}
                <a href="{{ Route::has('admin.values.index') ? route('admin.values.index') : '#' }}" class="block transform transition hover:scale-105 duration-300 group">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-purple-500 p-6 h-full hover:shadow-md">
                        <div class="flex items-start space-x-4">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600 group-hover:bg-purple-200 transition">
                                {{-- Ikon Bintang/Nilai --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 3.214L18 21l-6.857-2.286L6 21l1.5-4.286M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-1">Nilai Perusahaan</h4>
                                <p class="text-sm text-gray-500">Edit 3 poin keunggulan Mang Ismu.</p>
                            </div>
                        </div>
                    </div>
                </a>

                 {{-- KARTU 5: KELOLA LOKASI --}}
                 <a href="{{ Route::has('admin.location.index') ? route('admin.location.index') : '#' }}" class="block transform transition hover:scale-105 duration-300 group">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-600 p-6 h-full hover:shadow-md">
                        <div class="flex items-start space-x-4">
                            <div class="p-3 rounded-full bg-red-100 text-red-600 group-hover:bg-red-200 transition">
                                {{-- Ikon Peta --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-1">Lokasi Cabang</h4>
                                <p class="text-sm text-gray-500">Tambah atau hapus alamat outlet.</p>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>