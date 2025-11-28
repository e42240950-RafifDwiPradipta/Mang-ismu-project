<?php
// app/Models/Value.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'icon', // Untuk ikon (misalnya nama class Font Awesome atau path gambar)
        'title', 
        'short_description', 
        'detail_description',
        'image_path', // <--- WAJIB ADA
    ];
}