<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Nilai Perusahaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- HEADER & TOMBOL TAMBAH (PASTIKAN BIRU) --}}
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Daftar Nilai</h3>
                        
                        {{-- Tombol Tambah Data (BG BIRU) --}}
                        <a href="{{ route('admin.values.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Tambah Nilai Baru
                        </a>
                    </div>

                    {{-- Tabel Data --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">No</th>
                                    <th class="py-3 px-6 text-left">Gambar / Logo</th>
                                    <th class="py-3 px-6 text-left">Judul</th>
                                    <th class="py-3 px-6 text-left">Deskripsi Singkat</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse($values as $index => $value)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            @if($value->image_path)
                                                <img src="{{ asset('storage/' . $value->image_path) }}" 
                                                alt="Logo" 
                                                class="h-16 w-16 object-cover rounded"
>
                                            @else
                                                <span class="text-gray-400 text-xs italic">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-6 text-left font-bold">
                                            {{ $value->title }}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            {{ Str::limit($value->short_description, 50) }}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center gap-2">
                                                {{-- Tombol Edit (KUNING/ORANYE, IKON HITAM) --}}
                                                <a href="{{ route('admin.values.edit', $value->id) }}" class="w-8 h-8 rounded bg-white text-yellow-600 border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                {{-- Tombol Hapus (MERAH, IKON MERAH) --}}
                                                <form action="{{ route('admin.values.destroy', $value->id) }}" method="POST" ononsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-8 h-8 rounded bg-white text-red-600 border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition" title="Hapus">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <p class="text-lg font-medium">Belum ada data nilai.</p>
                                                <p class="text-sm text-gray-400 mt-1">Silakan klik tombol "+ Tambah Nilai Baru" di atas.</p>
                                            </div>
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