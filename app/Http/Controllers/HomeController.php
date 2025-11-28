<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider; 
use App\Models\Gallery; 
use App\Models\Value; 
// --- PERBAIKAN 1: TAMBAHKAN IMPORT MODEL LOCATION ---
use App\Models\Location; 
// ----------------------------------------------------

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda publik.
     */
    public function index()
    {
        $sliders = Slider::latest()->get(); 
        $galleries = Gallery::latest()->take(3)->get();
        $values = Value::latest()->get(); 

        // --- PERBAIKAN 2: AMBIL DATA LOCATION ASLI ---
        // Mengambil max 2 lokasi terbaru untuk ditampilkan di Homepage
        $branches = Location::latest()->take(2)->get(); 

        return view('home', [
            'sliders'   => $sliders,
            'galleries' => $galleries,
            'values'    => $values, 
            'branches'  => $branches // <-- Data dikirim ke view home
        ]);
    }

    /**
     * Tampilkan halaman lokasi.
     */
    public function lokasi()
    {
        // --- PERBAIKAN 3: AMBIL SEMUA DATA DARI DATABASE ---
        $locations = Location::all(); 

        return view('lokasi', [
            // Kirim data 'locations' agar bisa di-looping di view
            'locations' => $locations 
        ]); 
    }
}