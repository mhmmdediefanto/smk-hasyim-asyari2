<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pengumuman Sekolah',
            'Kegiatan Sekolah',
            'Prestasi Sekolah',
            'Informasi Akademik',
            'Kesiswaan & OSIS',
            'Guru & Tenaga Pendidik',
            'Sarana & Prasarana',
            'Kesehatan & Keamanan Sekolah',
            'Alumni & Karir',
            'Informasi Dunia Industri & PKL',
            'Kompetensi Keahlian & Sertifikasi',
            'Wirausaha & Kewirausahaan',
            'Kerja Sama dengan DUDI',
            'Event & Kompetisi Kejuruan',
        ];

        foreach ($categories as $value) {
            KategoriBerita::create([
                'name' => $value,
                'slug' => Str::slug($value),
                'user_id' => 1
            ]);
        }
    }
}
