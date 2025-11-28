<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Lokasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('admin.location.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Cabang --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Cabang</label>
                            <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required placeholder="Contoh: Cabang Alun-Alun">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat</label>
                            <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" rows="3" placeholder="Contoh: Tempat nongkrong asik di pusat kota..."></textarea>
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Lengkap</label>
                            <textarea name="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" rows="2" required></textarea>
                        </div>

                        {{-- Jam Buka --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Jam Operasional</label>
                            <input type="text" name="opening_hours" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" value="10:00 - 22:00" required>
                        </div>

                        {{-- Link Maps --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Link Google Maps (URL)</label>
                            <input type="url" name="map_link" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required placeholder="https://maps.google.com/...">
                        </div>

                        {{-- Upload Foto --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto Cabang</label>
                            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.location.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">Batal</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan Lokasi
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>