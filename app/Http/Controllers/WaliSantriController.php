<?php

namespace App\Http\Controllers;

use App\Models\wali_santri;
use Illuminate\Http\Request;

class WaliSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      if (auth()->user()->role !== 'walisantri') {
        abort(403, 'Anda tidak diizinkan masuk ke halaman ini.');
    }
    return view('walisantri.dashboard');
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
    public function show(wali_santri $wali_santri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wali_santri $wali_santri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wali_santri $wali_santri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wali_santri $wali_santri)
    {
        //
    }
}
