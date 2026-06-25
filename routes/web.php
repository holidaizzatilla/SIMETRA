<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\{AdminController, GuruController,SantriController, WalisantriController, PembinaController};

// --- HALAMAN UTAMA ---
Route::get('/', fn() => view('welcome', ['title' => 'Selamat Datang']))->name('welcome');

// --- AUTENTIKASI ---
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

// --- AREA TERAUTENTIKASI ---
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- ADMIN GROUP ---
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/rekapitulasi', [AdminController::class, 'rekapitulasi'])->name('rekapitulasi');
        Route::get('/profil', [AdminController::class, 'editProfilAdmin'])->name('profil');
        Route::post('/profil/update', [AdminController::class, 'updateProfilAdmin'])->name('profil.update');

        // CRUD Guru, Pembina, Santri
        Route::resource('guru', GuruController::class);
        Route::resource('pembina', PembinaController::class);
        Route::resource('santri', SantriController::class); 

        // Rute khusus Admin untuk Wali Santri
        // Kita gunakan route biasa karena wali tidak di-CRUD via admin (tapi via registrasi)
        Route::get('/wali', [Admin/WaliController::class, 'index'])->name('wali.index');
        Route::delete('/wali/{id}', [Admin/WaliController::class, 'destroy'])->name('wali.destroy');
    });

    // --- ROLE GROUP ---
    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/pembina/dashboard', [PembinaController::class, 'index'])->name('pembina.dashboard');
    Route::get('/walisantri/dashboard', [WalisantriController::class, 'index'])->name('walisantri.dashboard');
});