<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
{
    if (Auth::user()->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
    return view('admin.dashboard');
}
}