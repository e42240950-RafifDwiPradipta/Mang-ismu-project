<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lokasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('admin.location.update', $location->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- PENTING UNTUK UPDATE --}}

                        {{-- Nama Cabang --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Cabang</label>
                            <input type="text" name="name" value="{{ old('name', $location->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat</label>
                            <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" rows="3">{{ old('description', $location->description) }}</textarea>
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Lengkap</label>
                            <textarea name="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" rows="2" required>{{ old('address', $location->address) }}</textarea>
                        </div>

                        {{-- Jam Buka --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Jam Operasional</label>
                            <input type="text" name="opening_hours" value="{{ old('opening_hours', $location->opening_hours) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                        </div>

                        {{-- Link Maps --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Link Google Maps (URL)</label>
                            <input type="url" name="map_link" value="{{ old('map_link', $location->map_link) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                        </div>

                        {{-- Foto Saat Ini --}}
                        @if($location->image_path)
                            <div class="mb-2">
                                <p class="text-sm text-gray-600 mb-1">Foto Saat Ini:</p>
                                <img src="{{ asset('storage/' . $location->image_path) }}" class="h-32 rounded shadow">
                            </div>
                        @endif

                        {{-- Upload Foto Baru --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto (Opsional)</label>
                            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.location.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">Batal</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Lokasi
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>