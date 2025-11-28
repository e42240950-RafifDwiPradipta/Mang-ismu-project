<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Cabang (misal: Cabang Pusat)
            $table->text('description')->nullable(); // Deskripsi singkat
            $table->string('address'); // Alamat lengkap
            $table->string('opening_hours')->default('10:00 - 22:00'); // Jam buka
            $table->string('map_link'); // Link Google Maps
            $table->string('image_path')->nullable(); // Foto cabang
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};