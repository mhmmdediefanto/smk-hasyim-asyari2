<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadOnDeleteImageController extends Controller
{
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


    public function deleteImage(Request $request)
    {
        $filename = $request->filename; // Nama file dari request
        $filePath = 'uploads/' . $filename; // Pastikan path sesuai dengan lokasi penyimpanan

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return response()->json(['message' => 'Gambar berhasil dihapus'], 200);
        }

        return response()->json(['message' => 'Gambar tidak ditemukan'], 404);
    }
}
