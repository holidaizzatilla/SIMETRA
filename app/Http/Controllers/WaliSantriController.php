<?php

namespace App\Http\Controllers;

use App\Models\wali_santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliSantriController extends Controller
{
    public function index()
    {
        // Langsung ambil user yang login via guard
        $wali = Auth::guard('walisantri')->user();
        
        $santri = $wali->santri; 
        $setoran = $santri ? $santri->setoran_hafalan()->latest()->get() : [];

        return view('walisantri.dashboard', compact('wali', 'santri', 'setoran'));
    }

    public function editProfile()
    {
        $wali = Auth::guard('walisantri')->user();
        return view('walisantri.profile', compact('wali'));
    }

    public function updateProfile(Request $request)
    {
        $wali = Auth::guard('walisantri')->user();
        
        $request->validate([
            'nama_wali' => 'required',
            'no_telp' => 'required'
        ]);

        $wali->update([
            'nama_wali' => $request->nama_wali,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->route('walisantri.dashboard')->with('success', 'Profil berhasil diupdate');
    }
}