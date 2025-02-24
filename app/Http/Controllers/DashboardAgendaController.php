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
                'tempat' => 'required',
                'slug' => 'required|unique:agendas',
            ]);

            $validatedData['user_id'] = Auth::user()->id;
            $validatedData['body'] = $request->body;

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

    public function editShow($id)
    {
        $agenda = Agenda::find($id);
        return view('dashboard.agenda-kegiatan.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        try {

            DB::beginTransaction();
            $agenda = Agenda::find($id);

            if (!$agenda) {
                return back()->with('error', 'Agenda tidak ditemukan');
            }

            $rules = [
                'title' => 'required|max:255',
                'tanggal_mulai' => 'required',
                'tanggal_selesai' => 'required',
                'penyelenggara' => 'required',
                'tempat' => 'required',

            ];

            if ($request->slug != $agenda->slug) {
                $rules['slug'] = 'required|unique:agendas';
            }

            if ($request->image) {
                $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024';
            }

            $validatedData = $request->validate($rules);

            $validatedData['body'] = $request->body;

            if ($request->image) {
                if ($request->oldImage) {
                    Storage::disk('public')->delete($request->oldImage);
                }

                $validatedData['image'] = $request->file('image')->store('images/agenda', 'public');
            }

            $agenda->update($validatedData);
            DB::commit();

            return back()->with('success', 'Agenda Berhasil Diubah');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        if ($agenda) {
            // dd($agenda->image);
            Storage::disk('public')->delete($agenda->image);
        }

        // Cari semua gambar dalam konten menggunakan regex
        preg_match_all('/<img.*?src=["\']([^"\']+)["\']/', $agenda->body, $matches);

        // Jika ada gambar di dalam konten, hapus satu per satu
        if (!empty($matches[1])) {
            foreach ($matches[1] as $image) {
                // Ambil path dari URL (misalnya "storage/uploads/ckeditor/image.jpg")
                $path = str_replace(Storage::url(''), '', $image);


                // dd($path);                // Hapus file dari penyimpanan
                Storage::disk('public')->delete($path);
            }
        }



        $agenda->delete();
        return back()->with('success', 'Agenda berhasil dihapus');
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
