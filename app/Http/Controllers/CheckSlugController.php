<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CheckSlugController extends Controller
{
    public function checkSlug(Request $request)
    {
        $modelClass = 'App\\Models\\' . ucfirst($request->query('model'));
        if (!class_exists($modelClass)) {
            return response()->json(['error' => 'Model class not found'], 400);
        }


        $slug = SlugService::createSlug(KategoriBerita::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
