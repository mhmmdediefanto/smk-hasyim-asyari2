<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use Sluggable, HasFactory;

    protected $table = 'agendas';
    protected $fillable = ['user_id', 'title', 'image', 'slug', 'tanggal_mulai', 'tanggal_selesai', 'tempat', 'penyelenggara', 'body'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTanggalMulaiFormattedAttribute()
    {
        return Carbon::parse($this->tanggal_mulai)->translatedFormat('d F Y');
    }
    public function getTanggalSelesaiFormattedAttribute()
    {
        return Carbon::parse($this->tanggal_selesai)->translatedFormat('d F Y');
    }
}
