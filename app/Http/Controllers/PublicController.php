<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Carousel;
use App\Models\KategoriBerita;
use App\Models\LogVisitBerita;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {
        $agendas = Agenda::select('id', 'image', 'slug', 'title', 'tanggal_mulai', 'tempat')->latest()->take(6)->get();
        $carousels = Carousel::with('user')->select('image', 'title', 'tagline')->get();
        $beritas = Berita::with('user', 'kategoriBerita')->select('id', 'title', 'slug', 'image', 'user_id', 'excerpt', 'kategori_berita_id', 'created_at')->latest()->take(4)->get();
        return view('public.index', compact('beritas', 'carousels', 'agendas'));
    }

    public function beritaAll()
    {
        $kategories = KategoriBerita::select('id', 'slug', 'name')->get();
        $beritas = Berita::with(['user:id,name', 'kategoriBerita:id,name,slug', 'logVisitBeritas'])->select('id', 'title', 'slug', 'image', 'user_id', 'excerpt', 'kategori_berita_id', 'created_at')->latest()->paginate(10);

        // Berita terpopuler (3 berita dengan kunjungan terbanyak)
        $beritaTerpopulers = Berita::with(['user:id,name', 'kategoriBerita:id,name,slug'])
            ->select('id', 'title', 'slug', 'image')
            ->withCount('logVisitBeritas') // Hitung jumlah kunjungan
            ->orderByDesc('log_visit_beritas_count') // Urutkan berdasarkan kunjungan terbanyak
            ->take(5)
            ->get();


        return view('public.pages.berita-all', compact('beritas', 'kategories', 'beritaTerpopulers'));
    }

    public function agendaAll()
    {
        $agendas = Agenda::select('id', 'image', 'slug', 'title', 'tanggal_mulai', 'body')->latest()->paginate(10);
        return view('public.pages.agenda-all', compact('agendas'));
    }

    public function agendaShow($slug)
    {
        $agenda = Agenda::with('user')->where('slug', $slug)->firstOrFail();
        return view('public.pages.agenda-show', compact('agenda'));
    }

    public function show($slug, Request $request)
    {
        $berita = Berita::with('user', 'kategoriBerita')->where('slug', $slug)->firstOrFail();

        LogVisitBerita::create([
            'berita_id' => $berita->id,
            'url' => $request->fullUrl(),
            'user_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'visited_at' => now(),
        ]);
        return view('public.pages.show-detail-berita', compact('berita'));
    }
}
