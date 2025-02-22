<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Carousel;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {
        $carousels = Carousel::with('user')->select('image', 'title', 'tagline')->get();
        $beritas = Berita::with('user', 'kategoriBerita')->select('id', 'title', 'slug', 'image', 'user_id', 'excerpt', 'kategori_berita_id', 'created_at')->latest()->take(6)->get();
        return view('public.index', compact('beritas', 'carousels'));
    }

    public function show($slug)
    {

        $berita = Berita::with('user', 'kategoriBerita')->where('slug', $slug)->firstOrFail();
        return view('public.pages.show-detail-berita', compact('berita'));
    }
}
