<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searching = $request->query('search');

        // Ambil berita dengan filter pencarian sebelum paginate()
        $beritasQuery = Berita::with(['user:id,name', 'kategoriBerita:id,name,slug', 'logVisitBeritas'])
            ->select('id', 'title', 'slug', 'image', 'user_id', 'excerpt', 'kategori_berita_id', 'created_at')
            ->latest();

        if ($searching) {
            $beritasQuery->where('title', 'like', '%' . $searching . '%')
                ->orWhere('excerpt', 'like', '%' . $searching . '%')
                ->orWhere('body', 'like', '%' . $searching . '%');
        }

        $beritas = $beritasQuery->paginate(10); // ✅ PAGINATE SETELAH FILTER

        $kategories = KategoriBerita::select('id', 'slug', 'name')->get();

        $beritaTerpopulers = Berita::getBeritaTerpopuler();


        return view('public.pages.CariPages', [
            'beritas' => $beritas,
            'kategories' => $kategories,
            'beritaTerpopulers' => $beritaTerpopulers

        ]);
    }
}
