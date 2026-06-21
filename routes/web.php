<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\WalisantriController;
use App\Http\Controllers\PembinaController;

// --- HALAMAN UTAMA ---
Route::get('/', function () {
    return view('welcome', ['title' => 'Selamat Datang']);
})->name('welcome');

// --- PROSES AUTENTIKASI (GUEST) ---
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

// --- AREA TERAUTENTIKASI ---
Route::middleware(['auth'])->group(function () {
    
    // Proses Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- ADMIN GROUP ---
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/guru', [AdminController::class, 'guru'])->name('admin.guru');
        Route::get('/rekapitulasi', [AdminController::class, 'rekapitulasi'])->name('admin.rekapitulasi');
        Route::get('/profil', [AdminController::class, 'profil'])->name('admin.profil');
        Route::post('/profil/update', [AdminController::class, 'updateProfil'])->name('admin.profil.update');
        Route::get('/guru', [AdminController::class, 'guru'])->name('admin.guru');
    Route::get('/guru/create', [AdminController::class, 'createGuru'])->name('admin.guru.create');
    Route::post('/guru/store', [AdminController::class, 'storeGuru'])->name('admin.guru.store');
    Route::get('/guru/{id}/edit', [AdminController::class, 'editGuru'])->name('admin.guru.edit');
    Route::put('/guru/{id}', [AdminController::class, 'updateGuru'])->name('admin.guru.update');
    Route::delete('/guru/{id}', [AdminController::class, 'destroyGuru'])->name('admin.guru.destroy');
   Route::get('/admin/pembina', [AdminController::class, 'pembina'])->name('admin.pembina');
Route::get('/admin/pembina/create', [AdminController::class, 'createPembina'])->name('admin.pembina.create');
Route::post('/admin/pembina/store', [AdminController::class, 'storePembina'])->name('admin.pembina.store');
Route::get('/admin/pembina/{id}/edit', [AdminController::class, 'editPembina'])->name('admin.pembina.edit');
Route::put('/admin/pembina/{id}', [AdminController::class, 'updatePembina'])->name('admin.pembina.update');
Route::delete('/admin/pembina/{id}', [AdminController::class, 'destroyPembina'])->name('admin.pembina.destroy');

// Route Santri
Route::get('/admin/santri', [AdminController::class, 'santri'])->name('admin.santri');
Route::get('/admin/santri/create', [AdminController::class, 'createSantri'])->name('admin.santri.create');
Route::post('/admin/santri/store', [AdminController::class, 'storeSantri'])->name('admin.santri.store');
Route::get('/admin/santri/{id}/edit', [AdminController::class, 'editSantri'])->name('admin.santri.edit');
Route::put('/admin/santri/{id}', [AdminController::class, 'updateSantri'])->name('admin.santri.update');
Route::delete('/admin/santri/{id}', [AdminController::class, 'destroySantri'])->name('admin.santri.destroy');
Route::get('/admin/walisantri', [AdminController::class, 'waliSantri'])->name('admin.walisantri');
Route::get('/admin/walisantri/create', [AdminController::class, 'createWaliSantri'])->name('admin.walisantri.create');
Route::post('/admin/walisantri/store', [AdminController::class, 'storeWaliSantri'])->name('admin.walisantri.store');
Route::get('/admin/walisantri/{id}/edit', [AdminController::class, 'editWaliSantri'])->name('admin.walisantri.edit');
Route::put('/admin/walisantri/{id}', [AdminController::class, 'updateWaliSantri'])->name('admin.walisantri.update');
Route::delete('/admin/walisantri/{id}', [AdminController::class, 'destroyWaliSantri'])->name('admin.walisantri.destroy');
});

    // --- GURU GROUP ---
    Route::prefix('guru')->group(function () {
        Route::get('/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
       
    });

    // --- PEMBINA GROUP ---
    Route::prefix('pembina')->group(function () {
        Route::get('/dashboard', [PembinaController::class, 'index'])->name('pembina.dashboard');
       
    });

    // --- WALISANTRI GROUP ---
    Route::prefix('walisantri')->group(function () {
        Route::get('/dashboard', [WalisantriController::class, 'index'])->name('walisantri.dashboard');

    });
});