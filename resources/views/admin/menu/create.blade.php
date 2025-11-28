<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Menu Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        
                        {{-- 1. NAMA PRODUK --}}
                        <div class="mb-4">
                            <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        {{-- 2. DESKRIPSI --}}
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                        </div>

                        {{-- 3. HARGA (INI TAMBAHAN BARU) --}}
                        <div class="mb-4">
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                            <input type="number" 
                                   name="harga" 
                                   id="harga" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                   placeholder="Contoh: 15000 (Tanpa titik)"
                                   required>
                        </div>

                        {{-- 4. KATEGORI --}}
                        <div class="mb-4">
                            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kategori" id="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                                <option value="camilan">Camilan</option>
                            </select>
                        </div>

                        {{-- 5. FOTO MENU --}}
                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">Foto Menu</label>
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full" required>
                        </div>

                        <div>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                                Simpan Menu
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>