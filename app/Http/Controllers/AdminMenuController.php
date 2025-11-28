<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // WAJIB ADA INI

class AdminMenuController extends Controller
{
    /**
     * Menampilkan daftar semua menu
     */
    public function index()
    {
        $menus = Menu::latest()->get(); 
        return view('admin.menu.index', [
            'menus' => $menus
        ]);
    }

    /**
     * Menampilkan formulir tambah menu baru
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Menyimpan menu baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input (Termasuk Harga)
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|numeric', // <--- TAMBAHAN: Validasi Harga (Wajib Angka)
            'kategori'    => 'required|string',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Upload Gambar
        $gambarPath = $request->file('gambar')->store('menu-images', 'public');

        // 3. Simpan ke Database
        Menu::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,    // <--- TAMBAHAN: Simpan Harga
            'kategori'    => $request->kategori,
            'gambar_path' => $gambarPath,
        ]);

        return redirect()->route('admin.menu.index')
                         ->with('success', 'Menu baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan formulir edit menu
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', [
            'menu' => $menu
        ]);
    }

    /**
     * Menyimpan perubahan (update) menu ke database
     */
    public function update(Request $request, Menu $menu)
    {
        // 1. Validasi Input (Termasuk Harga)
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|numeric', // <--- TAMBAHAN: Validasi Harga
            'kategori'    => 'required|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Ambil data input (Termasuk Harga)
        $data = $request->only(['nama_produk', 'deskripsi', 'harga', 'kategori']); // <--- TAMBAHAN 'harga' DI SINI

        // 3. Cek apakah ada upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($menu->gambar_path) {
                Storage::disk('public')->delete($menu->gambar_path);
            }
            // Upload gambar baru
            $gambarPath = $request->file('gambar')->store('menu-images', 'public');
            $data['gambar_path'] = $gambarPath;
        }

        // 4. Update data di database
        $menu->update($data);

        return redirect()->route('admin.menu.index')
                         ->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Menghapus menu dari database
     */
    public function destroy(Menu $menu)
    {
        // 1. Hapus file gambar dari storage
        if ($menu->gambar_path) {
            Storage::disk('public')->delete($menu->gambar_path);
        }
        
        // 2. Hapus data dari database
        $menu->delete();

        // 3. Kembalikan ke halaman daftar menu
        return redirect()->route('admin.menu.index')
                         ->with('success', 'Menu berhasil dihapus!');
    }
}