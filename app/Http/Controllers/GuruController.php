<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if (auth()->user()->role !== 'guru') {
        abort(403, 'Anda tidak diizinkan masuk ke halaman ini.');
    }
    $guruList = collect([
        (object) ['id' => 1, 'name' => 'Ustadz Ahmad', 'username' => 'ustadz_ahmad'],
        (object) ['id' => 2, 'name' => 'Ustadz Budi', 'username' => 'ustadz_budi'],
    ]);
    return view('guru.dashboard');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guru $guru)
    {
        //
    }
}
