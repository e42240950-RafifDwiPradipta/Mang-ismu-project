<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * INI ADALAH "DAFTAR TAMU" (KOLOM YANG AMAN)
     * Tambahkan array $fillable ini
     */
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'kategori',
        'gambar_path',
    ];
}