<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $guruList = Guru::all();
        return view('admin.guru.index', compact('guruList'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'jk'        => 'required|in:L,P',
            'no_telp'   => 'required|string|max:20',
            'username'  => 'required|string|unique:gurus,username',
            'password'  => 'required|min:6',
        ]);

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'jk'        => $request->jk,
            'no_telp'   => $request->no_telp,
            'username'  => $request->username,
            'password'  => bcrypt($request->password), 
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'jk'        => 'required|in:L,P',
            'no_telp'   => 'required|string|max:20',
            'username'  => 'required|string|unique:gurus,username,'.$id,
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'jk'        => $request->jk,
            'no_telp'   => $request->no_telp,
            'username'  => $request->username,
        ]);

        if ($request->filled('password')) {
            $guru->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Guru::findOrFail($id)->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus!');
    }
}