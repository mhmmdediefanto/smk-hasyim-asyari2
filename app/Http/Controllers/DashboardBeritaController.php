<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class DashboardBeritaController extends Controller
{
    public function index()
    {
        return view('dashboard.berita.index');
    }

    public function create()
    {
        $kategories = KategoriBerita::select('id', 'name')->get();
        // dd($kategories);
        return view('dashboard.berita.create', compact('kategories'));
    }
}
