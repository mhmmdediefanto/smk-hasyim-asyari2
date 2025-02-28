<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\SettingsFront;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $agenda = Agenda::count();
        $berita = Berita::count();
        return view('dashboard.index', compact('agenda', 'berita'));
    }

    public function settingShow()
    {
        $settingsFront =  SettingsFront::first();

    //   dd($settingsFront);
        return view('dashboard.settings.index', compact('settingsFront'));
    }
}
