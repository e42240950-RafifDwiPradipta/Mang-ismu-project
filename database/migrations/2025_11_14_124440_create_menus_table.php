<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id(); 
            
            // Kolom-kolom Menu
            // Pastikan nama kolom ini sama dengan yang ada di Model & View Anda nanti
            $table->string('nama_produk'); 
            $table->text('deskripsi');     
            $table->integer('harga');      // <--- INI TAMBAHANNYA (Harga)
            $table->string('kategori');    
            $table->string('gambar_path'); 

            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};