<?php

namespace App\Http\Controllers;

use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // PENTING: Jangan dihapus/dicomment

class ValueController extends Controller
{
    // Tampilkan daftar semua Nilai
    public function index()
    {
        $values = Value::latest()->get();
        return view('admin.values.index', compact('values'));
    }

    // Tampilkan form untuk membuat Nilai baru
    public function create()
    {
        return view('admin.values.create');
    }

    // ==========================================
    // BAGIAN PENTING: LOGIKA SIMPAN BARU (STORE)
    // ==========================================
    public function store(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'title' => 'required|max:255',
            'icon' => 'nullable|max:255',
            // GANTI 'image' JADI 'file' AGAR SVG DITERIMA
            'image' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:2048', 
            'short_description' => 'required',
            'detail_description' => 'nullable'
        ]);

        // 2. Siapkan data teks dulu
        $data = $request->all();

        // 3. Cek apakah user upload file 'image'?
        if ($request->hasFile('image')) {
            // Simpan file ke folder 'public/values'
            // Hasilnya misal: "values/namafileacak.png"
            $path = $request->file('image')->store('values', 'public');
            
            // Masukkan path itu ke array data untuk disimpan ke DB
            $data['image_path'] = $path;
        }

        // 4. Simpan ke Database
        Value::create($data);

        return redirect()->route('admin.values.index')
                         ->with('success', 'Nilai berhasil ditambahkan.');
    }

    // Tampilkan form untuk mengedit Nilai
    public function edit(Value $value)
    {
        return view('admin.values.edit', compact('value'));
    }

    // ==========================================
    // BAGIAN PENTING: LOGIKA UPDATE (EDIT)
    // ==========================================
    public function update(Request $request, Value $value)
    {
        $request->validate([
            'title' => 'required|max:255',
            'icon' => 'nullable|max:255',
            // GANTI 'image' JADI 'file' AGAR SVG DITERIMA
            'image' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:2048',
            'short_description' => 'required',
            'detail_description' => 'nullable'
        ]);

        $data = $request->all();

        // Cek jika ada gambar BARU diupload
        if ($request->hasFile('image')) {
            
            // HAPUS GAMBAR LAMA (supaya server gak penuh sampah)
            if ($value->image_path && Storage::disk('public')->exists($value->image_path)) {
                Storage::disk('public')->delete($value->image_path);
            }

            // SIMPAN GAMBAR BARU
            $path = $request->file('image')->store('values', 'public');
            $data['image_path'] = $path;
        }

        // Update data
        $value->update($data);

        return redirect()->route('admin.values.index')
                         ->with('success', 'Nilai berhasil diperbarui.');
    }

    // Hapus Nilai dari database
    public function destroy(Value $value)
    {
        // Hapus gambar fisiknya dulu sebelum hapus data di DB
        if ($value->image_path && Storage::disk('public')->exists($value->image_path)) {
            Storage::disk('public')->delete($value->image_path);
        }

        $value->delete();

        return redirect()->route('admin.values.index')
                         ->with('success', 'Nilai berhasil dihapus.');
    }
}
