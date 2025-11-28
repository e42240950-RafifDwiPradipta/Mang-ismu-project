<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicMenuController;
// Import Controller Admin
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\ValueController;
use App\Http\Controllers\AdminLocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Depan
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [PublicMenuController::class, 'index'])->name('menu');
Route::get('/lokasi', [HomeController::class, 'lokasi']);

// 2. Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. GROUP KHUSUS ADMIN
Route::middleware('auth')->group(function () {
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- PINTU ADMIN (CRUD) ---
    // KUNCI PERBAIKAN ADA DI SINI: ->name('admin.')
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // CRUD Menu
        Route::resource('menu', AdminMenuController::class);
        
        // CRUD Slider
        Route::resource('slider', AdminSliderController::class);
        
        // CRUD Galeri
        Route::resource('gallery', AdminGalleryController::class);
        
        // CRUD Values (Nilai)
        Route::resource('values', ValueController::class);

        Route::resource('location', AdminLocationController::class);
        
    });

});

require __DIR__.'/auth.php';