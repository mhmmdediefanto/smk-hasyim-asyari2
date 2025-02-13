<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = ['user_id', 'kategori_berita_id', 'title', 'slug', 'image', 'excerpt', 'body'];
}
