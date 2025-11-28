<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    // 1. TAMPILKAN DAFTAR FOTO
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    // 2. TAMPILKAN FORM TAMBAH
    public function create()
    {
        return view('admin.gallery.create');
    }

    // 3. SIMPAN FOTO (Store)
    // Ini bagian yang sudah diperbaiki agar cocok dengan database Mas (judul & gambar_path)
    public function store(Request $request)
    {
        // Validasi input dari Form HTML (name="image" dan name="caption")
        $request->validate([
            'image'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        // Upload file gambar ke folder public
        $path = $request->file('image')->store('gallery-images', 'public');

        // Simpan ke Database (MAPPING DATA)
        Gallery::create([
            'judul'       => $request->caption, // Input 'caption' disimpan ke kolom 'judul'
            'gambar_path' => $path,             // Path file disimpan ke kolom 'gambar_path'
        ]);

        return redirect()->route('admin.gallery.index')
                         ->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    // 4. HAPUS FOTO
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file fisik dulu
        if ($gallery->gambar_path) {
            Storage::disk('public')->delete($gallery->gambar_path);
        }

        // Hapus data di database
        $gallery->delete();

        return redirect()->route('admin.gallery.index')
                         ->with('success', 'Foto berhasil dihapus!');
    }
}