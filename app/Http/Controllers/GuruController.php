<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{

    public function index()
    {
        $guruPhotos = [
            ["name" => "Nilta Hudaya, S.Pd.I.", "slug" => "nilta-hudaya-spdi", "file" => "Nilta Hudaya, S.Pd.I..jpg"],
            ["name" => "K. Mahmud Junaidi", "slug" => "k-mahmud-junaidi", "file" => "K. Mahmud Junaidi.jpg"],
            ["name" => "Galih Eviana, S. Kom", "slug" => "galih-eviana-s-kom", "file" => "Galih Eviana, S. Kom.jpg"],
            ["name" => "Nurul Ihya Mindasari, S.E.", "slug" => "nurul-ihya-mindasari-se", "file" => "Nurul Ihya Mindasari, S.E..jpg"],
            ["name" => "H. Khozin Muhaimin, Lc", "slug" => "h-khozin-muhaimin-lc", "file" => "H. Khozin Muhaimin, Lc.jpg"],
            ["name" => "Dyah Noor Asih, S.E", "slug" => "dyah-noor-asih-se", "file" => "Dyah Noor Asih, S.E.jpg"],
            ["name" => "Fifi Naila Sofa", "slug" => "fifi-naila-sofa", "file" => "Fifi Naila Sofa.jpg"],
            ["name" => "Sely Hidayati, S.Pd.", "slug" => "sely-hidayati-spd", "file" => "Sely Hidayati, S.Pd..jpg"],
            ["name" => "K. H. Masyhudi", "slug" => "k-h-masyhudi", "file" => "K. H. Masyhudi.jpg"],
            ["name" => "Muchammad Syafi'ul Huda", "slug" => "muchammad-syafiul-huda", "file" => "Muchammad Syafi_ul Huda.jpg"],
            ["name" => "Qurroti 'Ayun, S. Pd.", "slug" => "qurroti-ayun-spd", "file" => "Qurroti _Ayun, S. Pd.jpg"],
            ["name" => "Khoirul Wafa, S. E.", "slug" => "khoirul-wafa-se", "file" => "Khoirul Wafa, S. E..jpg"],
            ["name" => "Hj. Siti Khalimah, S. Pd. Ek", "slug" => "hj-siti-khalimah-spd-ek", "file" => "Hj. Siti Khalimah, S. Pd. Ek.jpg"],
            ["name" => "M. Syaifuddin Zuhri, S.Pd.I.", "slug" => "m-syaifuddin-zuhri-spdi", "file" => "M. Syaifuddin Zuhri, S.Pd.I..jpg"],
            ["name" => "Andi Fahrurrozi", "slug" => "andi-fahrurrozi", "file" => "Andi Fahrurrozi.jpg"],
            ["name" => "Nailal Husna, S.Pd.", "slug" => "nailal-husna-spd", "file" => "Nailal Husna, S.Pd..jpg"],
            ["name" => "K. H. Ahmad Badawi, A. Ma", "slug" => "k-h-ahmad-badawi-a-ma", "file" => "K. H. Ahmad Badawi, A. Ma.jpg"],
            ["name" => "H. Basirun Arief AH, S. Ag", "slug" => "h-basirun-arief-ah-s-ag", "file" => "H. Basirun Arief AH, S. Ag.jpg"],
            ["name" => "Lilies Oktaviani, S. Pd.", "slug" => "lilies-oktaviani-spd", "file" => "Lilies Oktaviani, S. Pd..jpg"],
            ["name" => "Siti Zumaroh, S. Pd.", "slug" => "siti-zumaroh-spd", "file" => "Siti Zumaroh,S. Pd.jpg"],
            ["name" => "Anggi Saslinasti, S. Pd.", "slug" => "anggi-saslinasti-spd", "file" => "Anggi Saslinasti, S. Pd..jpg"],
            ["name" => "Asih Sri Rahayu, S. Pd.", "slug" => "asih-sri-rahayu-spd", "file" => "Asih Sri Rahayu, S. Pd..jpg"],
            ["name" => "Burhanuddin, S. Kom", "slug" => "burhanuddin-s-kom", "file" => "Burhanuddin, S. Kom.jpg"],
            ["name" => "Moh. Rofiq", "slug" => "moh-rofiq", "file" => "Moh. Rofiq.jpg"],
            ["name" => "Muhammad Khoirul Falah, S. Pd.", "slug" => "muhammad-khoirul-falah-spd", "file" => "Muhammad Khoirul Falah, S. Pd..jpg"]
        ];


        return view('public.pages.guru.index', compact('guruPhotos'));
    }
}
