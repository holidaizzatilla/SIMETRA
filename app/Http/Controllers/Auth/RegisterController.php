<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Santri; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    Public function showRegistrationForm()
    {
        
        $daftarSantri = Santri::select('nama_santri', 'nis')->get();

        return view('auth.register', compact('daftarSantri'));
    }

    
    Public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            
            'username' => 'required|string|exists:santris,nis|unique:users,username', 
            'password' => 'required|string|min:6|confirmed', 
        ], [
            'username.exists' => 'Nomor Induk Santri (NIS) tidak ditemukan di sistem.',
            'username.unique' => 'Nomor Induk Santri (NIS) ini sudah terdaftar sebagai akun Wali.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal berisikan 6 karakter.'
        ]);

        
        $user = User::create([
            'name' => 'Wali dari ' . $request->name, 
            'username' => $request->username, 
            'password' => Hash::make($request->password),
            'role' => 'walisantri', 
        ]);

        
        Auth::login($user);

        
        return redirect()->route('wali.dashboard')->with('success', 'Akun berhasil dibuat. Selamat datang!');
    }
}