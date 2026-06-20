<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
    public function showLogin()
    {
        return view('auth.login'); 
    }

    
    public function login(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('username', 'password');

    // 2. Proses autentikasi
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        
        $user = Auth::user();

        // 3. PENGALIHAN BERDASARKAN ROLE
        switch ($user->role) {
    case 'admin':
        return redirect()->route('admin.dashboard');
    case 'guru':
        return redirect()->route('guru.dashboard');
    case 'walisantri':
        return redirect()->route('walisantri.dashboard');
    case 'pembina':
        return redirect()->route('pembina.dashboard');
    default:
        Auth::logout();
        return back()->withErrors(['loginError' => 'Hak akses tidak dikenali.']);
}
    }

    // Jika username/password salah
    return back()->withErrors([
        'loginError' => 'Username atau password yang Anda masukkan salah.',
    ])->onlyInput('username');
}

    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Berhasil keluar sistem.');
    }
}