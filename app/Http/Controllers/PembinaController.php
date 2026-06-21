<?php

namespace App\Http\Controllers;

use App\Models\pembina;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if (auth()->user()->role !== 'pembina') {
        abort(403, 'Anda tidak diizinkan masuk ke halaman ini.');
    }
    $pembinaList = collect([
        (object) ['id' => 1, 'name' => 'Ustadz Ahmad', 'username' => 'ustadz_ahmad'],
        (object) ['id' => 2, 'name' => 'Ustadz Budi', 'username' => 'ustadz_budi'],
    ]);
    return view('pembina.dashboard');
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
    public function show(pembina $pembina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembina $pembina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembina $pembina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembina $pembina)
    {
        //
    }
}
