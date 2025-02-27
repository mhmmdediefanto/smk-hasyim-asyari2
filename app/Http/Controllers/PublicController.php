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
        $beritas = Berita::with('kategoriBerita')->select('id', 'title', 'slug', 'image', 'user_id', 'excerpt', 'kategori_berita_id', 'created_at')->latest()->take(4)->get();
        return view('public.index', compact('beritas', 'carousels', 'agendas'));
    }

    public function beritaAll(Request $request)
    {
        $kategories = KategoriBerita::select('id', 'slug', 'name')->get();
        $beritas = Berita::with(['kategoriBerita:id,name,slug', 'logVisitBeritas'])->select('id', 'title', 'slug', 'image', 'user_id', 'excerpt', 'kategori_berita_id', 'created_at')->latest()->paginate(10);

        // Berita terpopuler (3 berita dengan kunjungan terbanyak)
        $beritaTerpopulers = Berita::getBeritaTerpopuler();


        return view('public.pages.berita-all', compact('beritas', 'kategories', 'beritaTerpopulers'));
    }

    public function agendaAll()
    {
        $agendas = Agenda::select('id', 'image', 'slug', 'title', 'tanggal_mulai', 'body', 'tempat')->latest()->paginate(10);


        $beritaTerpopulers = Berita::getBeritaTerpopuler();

        return view('public.pages.agenda-all', compact('agendas', 'beritaTerpopulers'));
    }

    public function agendaShow($slug)
    {
        $agendasTerbaru = Agenda::select('id', 'image', 'slug', 'title', 'tanggal_mulai', 'body', 'tempat')->take(6)->get();
        // dd($agendasTerbaru);
        $agenda = Agenda::with('user')->where('slug', $slug)->firstOrFail();
        return view('public.pages.agenda-show', compact('agenda', 'agendasTerbaru'));
    }

    public function show($slug, Request $request)
    {
        $berita = Berita::with('user', 'kategoriBerita')->where('slug', $slug)->firstOrFail();
        // Berita terpopuler (3 berita dengan kunjungan terbanyak)
        $beritaTerpopulers = Berita::getBeritaTerpopuler();
        $kategories = KategoriBerita::select('id', 'slug', 'name')->get();


        LogVisitBerita::create([
            'berita_id' => $berita->id,
            'url' => $request->fullUrl(),
            'user_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'visited_at' => now(),
        ]);
        return view('public.pages.show-detail-berita', compact('berita', 'beritaTerpopulers', 'kategories'));
    }


    public function beritaByKategori($slug)
    {
        $beritaTerpopulers = Berita::getBeritaTerpopuler();
        $kategories = KategoriBerita::select('id', 'slug', 'name')->get();


        $kategori = KategoriBerita::where('slug', $slug)->first();

        if (!$kategori) {
            abort(404, 'Kategori tidak ditemukan'); // Berikan respon error jika kategori tidak ada
        }

        $beritas = Berita::with(['kategoriBerita', 'logVisitBeritas'])->where('kategori_berita_id', $kategori->id)->latest()->simplePaginate(6);

        // dd($beritas);
        // Menggunakan pagination agar mendukung links()
        return view('public.pages.kategori-beritas', [
            'kategoriName' => $kategori->name,
            'beritas' => $beritas,
            'beritaTerpopulers' => $beritaTerpopulers,
            'kategories' => $kategories
        ]);
    }


    public function kategoriAll()
    {
        $kategories = KategoriBerita::select('id', 'slug', 'name')->get();

        return view('public.pages.kategori-all', compact('kategories'));
    }
}
