<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    protected $table = 'kategori_beritas';
    protected $fillable = ['name', 'slug'];

    
    
    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_berita_id');
    }

}
