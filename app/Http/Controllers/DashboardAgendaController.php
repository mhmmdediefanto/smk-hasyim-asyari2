<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardAgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::select('id', 'image',  'tempat', 'title', 'penyelenggara', 'tanggal_mulai', 'tanggal_selesai')->latest()->paginate(10);
        return view('dashboard.agenda-kegiatan.index', compact('agendas'));
    }

    public function create()
    {
        return view('dashboard.agenda-kegiatan.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'tanggal_mulai' => 'required',
                'tanggal_selesai' => 'required',
                'penyelenggara' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
                'body' => 'required',
                'tempat' => 'required',
                'slug' => 'required|unique:agendas',
            ]);

            $validatedData['user_id'] = Auth::user()->id;

            DB::beginTransaction();

            if ($request->image) {
                $validatedData['image'] = $request->file('image')->store('images/agenda', 'public');
            }

            Agenda::create($validatedData);


            DB::commit();
            return back()->with('success', 'Agenda Berhasil Ditambahkan');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }


    public function checkSlug(Request $request)
    {

        if (!$request->has('title')) {
            return response()->json(['error' => 'Title is required'], 400);
        }
        try {
            $slug = SlugService::createSlug(Agenda::class, 'slug', $request->title);
            return response()->json(['slug' => $slug]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
