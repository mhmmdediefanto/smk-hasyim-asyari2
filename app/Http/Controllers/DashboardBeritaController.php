<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardBeritaController extends Controller
{
    /*************  command  *************/
    /**
     * Show the list of Berita.
     *
     * @return \Illuminate\Http\Response
     */
    /******  64576a7b-155b-46c8-b819-4307ac4f0bc4  *******/
    public function index()
    {

        $beritas = Berita::with('kategoriBerita', 'user')->select('id', 'title', 'image', 'kategori_berita_id')->latest()->get();
        return view('dashboard.berita.index', compact('beritas'));
    }

    /*************  command  *************/
    /**
     * Display the form for creating a new Berita.
     *
     * @return \Illuminate\Http\Response
     */
    /******  c6af17ed-9bca-4c43-8e7f-b8d928026be3  *******/
    public function create()
    {
        $kategories = KategoriBerita::select('id', 'name')->get();
        // dd($kategories);
        return view('dashboard.berita.create', compact('kategories'));
    }

    /*************  command  *************/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /******  03800457-d59b-4183-b131-1fd989a5f477  *******/
    public function store(Request $request)
    {
        // dd($request->all());

        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|max:255|unique:beritas',
                'kategori_berita_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required',
            ]);

            $validatedData['user_id'] = Auth::user()->id;
            $validatedData['excerpt'] = substr(strip_tags($request->body), 0, 255);


            if ($request->image) {
                $validatedData['image'] = $request->file('image')->store('images/berita', 'public');
            }
            $suksess =  Berita::create($validatedData);

            return $suksess ? back()->with('success', 'Berita berhasil ditambahkan') : back()->with('error', 'Berita gagal ditambahkan');
        } catch (\Throwable $th) {
            // throw $th->getMessage();
            return back()->with('error', $th->getMessage());
        }
    }

    /*************  command  *************/
    /**
     * Check if the given title already has a slug in the database and return a slug if not.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    /******  0959179f-5d1f-417d-9f9a-4461f9f90139  *******/
    public function checkSlug(Request $request)
    {

        if (!$request->has('title')) {
            return response()->json(['error' => 'Title is required'], 400);
        }
        try {
            $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);
            return response()->json(['slug' => $slug]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    /*************  Command  *************/
    /**
     * Handle upload image for CKeditor
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    /******  b46fea9e-a93e-41f3-bdfa-0c28e0bc758c  *******/
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            

            $url = Storage::url($path);

            return response()->json([
                'uploaded' => true,
                'url' => $url,
            ]);
        }

        return response()->json(['error' => 'Upload image failed'], 500);
    }
}
