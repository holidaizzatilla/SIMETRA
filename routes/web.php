<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController; 
use App\Http\Controllers\WalisantriController;
use App\Http\Controllers\PembinaController;


Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Selamat Datang',
    ]);
})->name('welcome');

// --- PROSES AUTENTIKASI ---
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Halaman & Proses Registrasi Wali Santri
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/walisantri/dashboard', [WalisantriController::class, 'index'])->name('walisantri.dashboard');
    Route::get('/pembina/dashboard', [PembinaController::class, 'index'])->name('pembina.dashboard');

});

