<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            
            // Kolom untuk Ikon Font Awesome (Opsional)
            $table->string('icon')->nullable();

            // --- INI KOLOM BARU YANG KITA TAMBAHKAN ---
            // Menyimpan alamat gambar logo dari Figma
            $table->string('image_path')->nullable(); 
            // ------------------------------------------

            $table->string('title');
            $table->text('short_description');
            $table->text('detail_description')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values');
    }
};