<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu: ') }} {{ $menu->nama_produk }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        
                        {{-- 1. NAMA PRODUK --}}
                        <div class="mb-4">
                            <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('nama_produk', $menu->nama_produk) }}" required>
                        </div>

                        {{-- 2. DESKRIPSI --}}
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        </div>

                        {{-- 3. HARGA (TAMBAHAN UNTUK EDIT) --}}
                        <div class="mb-4">
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                            <input type="number" 
                                   name="harga" 
                                   id="harga" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                                   value="{{ old('harga', $menu->harga) }}" 
                                   placeholder="Contoh: 15000 (Tanpa titik)"
                                   required>
                        </div>

                        {{-- 4. KATEGORI --}}
                        <div class="mb-4">
                            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kategori" id="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="makanan" @if(old('kategori', $menu->kategori) == 'makanan') selected @endif>Makanan</option>
                                <option value="minuman" @if(old('kategori', $menu->kategori) == 'minuman') selected @endif>Minuman</option>
                                <option value="camilan" @if(old('kategori', $menu->kategori) == 'camilan') selected @endif>Camilan</option>
                            </select>
                        </div>

                        {{-- 5. FOTO MENU --}}
                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">Foto Menu (Baru)</label>
                            @if($menu->gambar_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $menu->gambar_path) }}" alt="{{ $menu->nama_produk }}" class="w-32 h-32 object-cover rounded shadow-sm border border-gray-200">
                                </div>
                            @endif
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100">
                            <small class="text-gray-500 mt-1 block">Kosongkan jika tidak ingin mengganti foto.</small>
                        </div>

                        <div>
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded shadow-md transition duration-150 ease-in-out">
                                Update Menu
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>