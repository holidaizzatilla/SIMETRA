<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\guru;

class AdminController extends Controller
{
    public function index()
    {
       if (auth()->user()->role !== 'admin') {
        abort(403, 'Anda tidak diizinkan masuk ke halaman ini.');
    }
        $stats = (object) [
        'total_guru'     => \App\Models\Guru::count(),
        'total_pembina'  => \App\Models\Pembina::count(), 
        'total_santri'   => \App\Models\Santri::count(),
        'total_wali'     => \App\Models\wali_santri::count(),
        
    ];
        return view('admin.dashboard', compact('stats'));
    }

    public function guru()
    {
        $guruList = \App\Models\Guru::all();
        return view('admin.guru.index', compact('guruList'));
    }

    // Tambahkan di dalam AdminController.php

public function createGuru()
{
    // Ini menampilkan form tambah guru
    return view('admin.guru.create');
}

public function storeGuru(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'nama_guru' => 'required|string|max:255',
        'jk'        => 'required|in:L,P',
        'no_telp'   => 'required|string|max:20',
        'username'  => 'required|string|unique:gurus,username',
        'password'  => 'required|min:6',
    ]);

    // 2. Simpan ke database
    \App\Models\guru::create([
        'nama_guru' => $request->nama_guru,
        'jk'        => $request->jk,
        'no_telp'   => $request->no_telp,
        'username'  => $request->username,
        'password'  => bcrypt($request->password), 
    ]);

    // 3. Redirect balik dengan pesan sukses
    return redirect()->route('admin.guru')->with('success', 'Data guru berhasil ditambahkan!');
}
public function editGuru($id)
{
    // 1. Cari data guru berdasarkan ID
    $guru = guru::findOrFail($id);
    
    // 2. Kirim data ke view edit
    return view('admin.guru.edit', compact('guru'));
}

public function updateGuru(Request $request, $id)
{
    // 1. Validasi input
    $request->validate([
        'nama_guru' => 'required|string|max:255',
        'jk'        => 'required|in:L,P',
        'no_telp'   => 'required|string|max:20',
        'username'  => 'required|string|unique:gurus,username,'.$id, // unique kecuali untuk dirinya sendiri
    ]);

    // 2. Cari data dan update
    $guru = guru::findOrFail($id);
    $guru->update([
        'nama_guru' => $request->nama_guru,
        'jk'        => $request->jk,
        'no_telp'   => $request->no_telp,
        'username'  => $request->username,
    ]);

    // 3. Update password jika diisi
    if ($request->filled('password')) {
        $guru->update(['password' => bcrypt($request->password)]);
    }

    return redirect()->route('admin.guru')->with('success', 'Data guru berhasil diperbarui!');
}
public function destroyGuru($id)
{
    
    $guru = \App\Models\guru::findOrFail($id);
    
    
    $guru->delete();
    
    
    return redirect()->route('admin.guru')->with('success', 'Data guru berhasil dihapus!');
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