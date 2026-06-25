<?php

namespace App\Http\Controllers;

use App\Models\Pembina; // Pastikan huruf besar (sesuai nama Class)
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Biasanya manajemen pembina diakses oleh 'admin', bukan 'pembina'
        // Silakan sesuaikan role-nya jika perlu
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak diizinkan masuk ke halaman ini.');
        }

        $pembinaList = Pembina::all(); 
        return view('admin.pembina.index', compact('pembinaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pembina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembina' => 'required|string|max:255',
            'periode'      => 'required|string|max:20',
            'username'     => 'required|unique:pembinas,username',
            'password'     => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($request->password);
        $validated['aktif'] = $request->has('aktif') ? true : false;

        Pembina::create($validated);

        return redirect()->route('admin.pembina.index')->with('success', 'Pembina berhasil ditambahkan!');
    }

    public function edit($id)
{
    $pembina = Pembina::findOrFail($id);
    return view('admin.pembina.edit', compact('pembina'));
} 
public function update(Request $request, $id)
    {
        $pembina = Pembina::findOrFail($id);

        $validated = $request->validate([
            'nama_pembina' => 'required|string|max:255',
            'periode'      => 'required|string|max:20',
            'username'     => 'required|unique:pembinas,username,' . $id,
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        }
        
       
// Di dalam method update atau store
$validated['aktif'] = $request->has('aktif') ? 'Y' : 'N';
$pembina->update($validated);

        return redirect()->route('admin.pembina.index')->with('success', 'Data pembina berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pembina::findOrFail($id)->delete();
        return redirect()->route('admin.pembina.index')->with('success', 'Data pembina berhasil dihapus!');
    }
}