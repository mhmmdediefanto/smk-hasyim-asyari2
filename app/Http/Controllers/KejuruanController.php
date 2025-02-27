<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KejuruanController extends Controller
{
    public function busanaFashion()
    {
        return view('public.pages.kejuruan.busana-fashion');
    }

    public function tjkt()
    {
        return view('public.pages.kejuruan.tjkt');
    }
}
