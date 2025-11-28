<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Mang Ismu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat Datang, Anda sudah login!") }}

                    <h3 class="text-lg font-semibold mt-6 mb-3">Pusat Admin (CRUD)</h3>

                    {{-- Link Kelola Menu --}}
                    <div class="mt-2">
                        <a href="{{ route('admin.menu.index') }}" class="font-bold text-blue-600 hover:underline">
                            --> Kelola Menu Makanan
                        </a>
                    </div>

                    {{-- Link Kelola Slider --}}
                    <div class="mt-2">
                        <a href="{{ route('admin.slider.index') }}" class="font-bold text-green-600 hover:underline">
                            --> Kelola Slider Beranda
                        </a>
                    </div>
                    
                    {{-- Link Kelola Galeri --}}
                    <div class="mt-2">
                        <a href="{{ route('admin.gallery.index') }}" class="font-bold text-yellow-600 hover:underline">
                            --> Kelola Galeri About (3 Foto)
                        </a>
                    </div>
                    
                    {{-- Link Kelola Nilai --}}
                    <div class="mt-2">
                        <a href="{{ route('admin.values.index') }}" class="font-bold text-purple-600 hover:underline">
                            --> Kelola Nilai Perusahaan (3 Kartu Values)
                        </a>
                    </div>

                    {{-- LINK BARU: Kelola Lokasi --}}
                    <div class="mt-2">
                        <a href="{{ route('admin.location.index') }}" class="font-bold text-red-600 hover:underline">
                            --> Kelola Lokasi Cabang (Maps & Alamat)
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>