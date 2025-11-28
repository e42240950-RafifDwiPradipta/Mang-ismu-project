<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Tambahkan "daftar tamu" ini
    protected $fillable = [
        'judul',
        'gambar_path',
    ];
}