<?php

namespace App\Http\Controllers;

use App\Models\Menu; // <-- Kita panggil "jembatan" Menu
use Illuminate\Http\Request;

class PublicMenuController extends Controller
{
    /**
     * Tampilkan halaman menu publik.
     */
    public function index()
    {
        // 1. Ambil semua menu yang kategorinya 'makanan'
        $makanan = Menu::where('kategori', 'makanan')->latest()->get();

        // 2. Ambil semua menu yang kategorinya 'minuman'
        $minuman = Menu::where('kategori', 'minuman')->latest()->get();

        // 3. Ambil semua menu yang kategorinya 'camilan'
        $camilan = Menu::where('kategori', 'camilan')->latest()->get();

        // 4. Kirim 3 grup data itu ke file view 'menu'
        return view('menu', [
            'makanan_items' => $makanan,
            'minuman_items' => $minuman,
            'camilan_items' => $camilan,
        ]);
    }
}