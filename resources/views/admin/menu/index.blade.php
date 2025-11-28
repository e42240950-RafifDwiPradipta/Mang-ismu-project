<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Tombol Tambah Menu --}}
                    <a href="{{ route('admin.menu.create') }}"
                       class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                        + Tambah Menu Baru
                    </a>

                    {{-- Notifikasi Sukses --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Produk</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th> {{-- KOLOM BARU --}}
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">

                                @forelse ($menus as $menu)
                                    <tr>
                                        {{-- 1. FOTO --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img src="{{ asset('storage/' . $menu->gambar_path) }}"
                                                 alt="{{ $menu->nama_produk }}"
                                                 class="w-16 h-16 object-cover rounded">
                                        </td>

                                        {{-- 2. NAMA PRODUK --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $menu->nama_produk }}</div>
                                        </td>

                                        {{-- 3. HARGA (DATA BARU) --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-bold text-gray-700">
                                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                            </div>
                                        </td>

                                        {{-- 4. KATEGORI --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 capitalize">
                                                {{ $menu->kategori }}
                                            </span>
                                        </td>

                                        {{-- 5. AKSI --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.menu.edit', $menu->id) }}"
                                               class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                            </a>

                                            {{-- Hapus --}}
                                            <form action="{{ route('admin.menu.destroy', $menu->id) }}"
                                                  method="POST"
                                                  class="inline-block ml-4"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5"
                                            class="px-6 py-4 text-sm text-gray-500 text-center">
                                            Belum ada data menu.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>