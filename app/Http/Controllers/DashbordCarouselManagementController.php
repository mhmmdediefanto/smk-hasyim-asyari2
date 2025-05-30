<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashbordCarouselManagementController extends Controller
{
    public function index()
    {
        $title = 'Delete Carousel';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);
        $carousels = Carousel::orderBy('id', 'desc')->select('id', 'image', 'title', 'tagline')->get();
        return view('dashboard.carousel.index', compact('carousels'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('images/carousel', 'public');
            }

            $idUser =  $validatedData['user_id'] = Auth::user()->id;

            Carousel::create([
                'image' => $validatedData['image'],
                'title' => $request->title,
                'tagline' => $request->tagline,
                'user_id' => $idUser
            ]);


            return back()->with('success', 'Carousel Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $carousel = Carousel::find($id);

        if ($request->file('image')) {
            Storage::disk('public')->delete($request->old_image);
        };

        $carousel->update([
            'image' => $request->file('image')->store('images/carousel', 'public'),
            'title' => $request->title,
            'tagline' => $request->tagline,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'Carousel Berhasil Diubah');
    }

    public function destroy($id)
    {
        // Temukan data menggunakan Eloquent
        $carousel = Carousel::find($id);

        if (!$carousel) {
            return back()->with('error', 'Carousel tidak ditemukan');
        }

        // Gunakan transaksi database untuk menghindari inkonsistensi data
        DB::beginTransaction();

        try {
            // Hapus gambar jika ada
            if ($carousel) {
                Storage::disk('public')->delete($carousel->image);
            }
            // Hapus data dari database
            $carousel->delete();

            DB::commit();
            return back()->with('success', 'Carousel Berhasil Dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus carousel');
        }
    }
}
