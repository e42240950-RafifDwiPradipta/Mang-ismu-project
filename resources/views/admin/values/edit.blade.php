<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Nilai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- FORM EDIT START --}}
                    <div class="container">
                        <h1 class="mb-4 text-lg font-bold">Edit Nilai: {{ $value->title }}</h1>
                        
                        <form action="{{ route('admin.values.update', $value->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- 1. JUDUL --}}
                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Judul Nilai</label>
                                <input type="text" name="title" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1" value="{{ old('title', $value->title) }}" required>
                            </div>

                            {{-- 2. UPLOAD GAMBAR (LOGO FIGMA) --}}
                            <div class="mb-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <label class="block font-bold text-sm text-gray-700">Upload Gambar / Logo (Opsi Utama)</label>
                                <p class="text-xs text-gray-500 mb-2">Pilih file PNG/JPG/SVG hasil desain Figma Anda.</p>
                                
                                <input type="file" name="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                                
                                @if($value->image_path)
                                    <div class="mt-3">
                                        <p class="text-xs text-gray-500">Gambar Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $value->image_path) }}" class="h-16 w-auto object-contain mt-1 border rounded p-1 bg-white">
                                    </div>
                                @endif
                            </div>

                            {{-- 3. ATAU PAKAI IKON FONT AWESOME --}}
                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Atau Gunakan Kode Ikon (Opsi Cadangan)</label>
                                <input type="text" name="icon" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1" value="{{ old('icon', $value->icon) }}" placeholder="Contoh: fas fa-star">
                                <p class="text-xs text-gray-500 mt-1">Kosongkan ini jika Anda sudah upload gambar di atas.</p>
                            </div>

                            {{-- 4. DESKRIPSI --}}
                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Deskripsi Singkat</label>
                                <textarea name="short_description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1" rows="3" required>{{ old('short_description', $value->short_description) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Deskripsi Detail (Opsional)</label>
                                <textarea name="detail_description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1" rows="5">{{ old('detail_description', $value->detail_description) }}</textarea>
                            </div>

                            <div class="flex items-center gap-4 mt-6">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Update Nilai
                                </button>
                                <a href="{{ route('admin.values.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                    {{-- FORM EDIT END --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>