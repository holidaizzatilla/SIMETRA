<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\{Guru, Pembina, Santri, WaliSantri};

class AdminController extends Controller
{
    public function index()
    {
       if (auth()->user()->role !== 'admin') {
        abort(403, 'Anda tidak diizinkan masuk ke halaman ini.');
    }
    $stats = (object) [
            'total_guru'    => guru::count(),
            'total_pembina' => pembina::count(),
            'total_santri'  => santri::count(),
            'total_wali'    => \App\Models\wali_santri::count(), 
    ];
        
        return view('admin.dashboard', compact('stats'));
    }

    public function rekapitulasi()
    {
        return view('admin.rekapitulasi.index');
    }

    public function editProfilAdmin()
    {
        $admin = auth()->user();
        return view('admin.profil', compact('admin'));
    }

    public function updateProfilAdmin(Request $request)
    {
        $admin = auth()->user();

        // Validasi input
        $request->validate([
            'name'             => 'required|string|max:255',
            'username'         => 'required|string|max:255|unique:users,username,' . $admin->id,
            'current_password' => 'required',
            'password'         => 'nullable|string|min:6|confirmed',
        ]);

        // Cek password saat ini
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini yang Anda masukkan salah!']);
        }

        // Update data dasar
        $admin->name = $request->name;
        $admin->username = $request->username;

        // Update password jika diisi
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password); // Lebih aman pakai Hash::make
        }

        $admin->save();

        return redirect()->back()->with('success', 'Profil dan keamanan akun Anda berhasil diperbarui!');
    }
}