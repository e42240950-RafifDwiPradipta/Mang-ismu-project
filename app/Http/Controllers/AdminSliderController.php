<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get(); // 1. Ambil SEMUA data dari tabel 'sliders'
        return view('admin.slider.index', [ // 2. Kirim data '$sliders' itu ke file view
        'sliders' => $sliders
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data (pastikan file-nya gambar)
    $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Wajib gambar, maks 2MB
    ]);

    // 2. Upload gambar
    // Ini akan menyimpan file di: storage/app/public/slider-images
    // dan 'gambarPath' akan berisi: 'slider-images/namafile.jpg'
    $gambarPath = $request->file('gambar')->store('slider-images', 'public');

    // 3. Simpan data ke database
    // (Kita sudah 'use App\Models\Slider;' di atas)
    Slider::create([
        'gambar_path' => $gambarPath, // Simpan lokasi file
    ]);

    // 4. Setelah selesai, kembalikan admin ke halaman daftar slider
    // Kita juga kirim "pesan sukses"
    return redirect()->route('admin.slider.index')
                     ->with('success', 'Gambar slider baru berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider) // <-- HAPUS INI
    {
        // 1. Hapus file gambar dari folder 'storage/app/public/slider-images'
        Storage::disk('public')->delete($slider->gambar_path);
        
        // 2. Hapus data slider ini dari tabel 'sliders' di database
        $slider->delete();

        // 3. Kembalikan admin ke halaman daftar slider
        return redirect()->route('admin.slider.index')
                         ->with('success', 'Gambar slider berhasil dihapus!');
    }
}
