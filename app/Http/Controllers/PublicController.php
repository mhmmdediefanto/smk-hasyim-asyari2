<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {
        $beritas = Berita::with('user', 'kategoriBerita')->select('id', 'title', 'slug', 'image', 'user_id', 'excerpt', 'kategori_berita_id', 'created_at')->latest()->paginate(6);
        return view('public.index', compact('beritas'));
    }

    public function show($slug)
    {

        $berita = Berita::with('user', 'kategoriBerita')->where('slug', $slug)->firstOrFail();
        return view('public.pages.show-detail-berita', compact('berita'));
    }
}
