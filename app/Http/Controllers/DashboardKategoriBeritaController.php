<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class DashboardKategoriBeritaController extends Controller
{
    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /******  e03f93de-07e7-49ae-9d7b-8e5ee61f7fa9  *******/
    public function index()
    {
        $kategories = KategoriBerita::select('id', 'name', 'slug')->latest()->get();
        return view('dashboard.kategori-berita.index', compact('kategories'));
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /******  b9bafe8c-69e9-4e59-b16e-06153794b969  *******/
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'slug' => 'required|max:255|unique:kategori_beritas',
            ]);

            // dd($validatedData);
            KategoriBerita::create($validatedData);
            return back()->with('success', 'Kategori Berita Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /******  682e92e0-927d-4b0c-9645-5d6c13f399e4  *******/
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $kategoriBerita = KategoriBerita::find($id);

        $rules = [
            'name' => 'required|max:255',
        ];

        if ($kategoriBerita->slug != $request->slug) {
            $rules['slug'] = 'required|max:255|unique:kategori_beritas';
        }

        try {
            $validatedData = $request->validate($rules);
            $kategoriBerita->update($validatedData);
            return back()->with('success', 'Kategori Berita Berhasil Diubah');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /******  e52330f9-b788-41be-84fd-52d1a42f048d  *******/
    public function destroy($id)
    {
        $kategoriBerita = KategoriBerita::find($id);
        $kategoriBerita->delete();
        return back()->with('success', 'Kategori Berita Berhasil Dihapus');
    }
}
