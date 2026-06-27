<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\wali_santri;

class WaliController extends Controller
{
    public function index()
    {
        $waliList = wali_santri::with('santri')->latest()->paginate(20);
        return view('admin.wali.index', compact('waliList'));
    }

    public function destroy($id)
    {
        $wali = wali_santri::findOrFail($id);
        $wali->delete();
        return redirect()->route('admin.wali.index')->with('success', 'Akun wali berhasil dihapus');
    }
}