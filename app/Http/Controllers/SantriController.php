<?php

namespace App\Http\Controllers;

use App\Models\santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $santriList = Santri::query()
        // Filter Pencarian (Nama/NIS)
        ->when($request->search, function ($query, $search) {
            $query->where('nama_santri', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
        })
        // Filter Kamar
        ->when($request->kamar, function ($query, $kamar) {
            $query->where('kamar', $kamar);
        })
        // Filter JK
        ->when($request->jk, function ($query, $jk) {
            $query->where('jk', $jk);
        })
        ->paginate(20)
        ->withQueryString(); // Agar filter tetap ada saat pindah halaman

    return view('admin.santri.index', compact('santriList'));
}
    /**
     * Show the form for creating a new resource.
     */
    // app/Http/Controllers/SantriController.php

public function create()
{
    return view('admin.santri.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nis' => 'required|unique:santris,nis',
        'nama_santri' => 'required',
        'jk' => 'required',
        'kamar' => 'required',
        'jumlah_hafalan_juz' => 'required|numeric',
    ]);

    \App\Models\Santri::create($validated);
    return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(santri $santri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // app/Http/Controllers/SantriController.php

public function edit($id)
{
    $santri = \App\Models\Santri::findOrFail($id);
    return view('admin.santri.edit', compact('santri'));
}

public function update(Request $request, $id)
{
    $santri = \App\Models\Santri::findOrFail($id);
    
    $validated = $request->validate([
        'nis' => 'required|unique:santris,nis,' . $id,
        'nama_santri' => 'required',
        'jk' => 'required',
        'kamar' => 'required',
        'jumlah_hafalan_juz' => 'required|numeric',
    ]);

    $santri->update($validated);
    return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil diupdate!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(santri $santri)
    {
        //
    }
}
