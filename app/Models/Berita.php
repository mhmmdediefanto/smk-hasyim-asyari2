<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{

    use Sluggable;
    protected $table = 'beritas';
    protected $fillable = ['user_id', 'kategori_berita_id', 'title', 'slug', 'image', 'excerpt', 'body'];


    /*************  command  *************/
    /**
     * Get the kategoriBerita that owns the Berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /******  47bf0291-ad5c-4829-863f-686afa68235c  *******/
    public function kategoriBerita(): BelongsTo
    {
        return $this->belongsTo(KategoriBerita::class);
    }

    /*************  command  *************/
    /**
     * Get the user that owns the Berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /******  1114cd38-6527-44b4-a973-130335654783  *******/
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('d F Y');
    }

    public function logVisitBeritas()
    {
        return $this->hasMany(LogVisitBerita::class);
    }

    public static function getBeritaTerpopuler()
    {
        return   // Berita terpopuler (3 berita dengan kunjungan terbanyak)
            self::with(['user:id,name', 'kategoriBerita:id,name,slug'])
            ->select('id', 'title', 'slug', 'image')
            ->withCount('logVisitBeritas') // Hitung jumlah kunjungan
            ->orderByDesc('log_visit_beritas_count') // Urutkan berdasarkan kunjungan terbanyak
            ->take(5)
            ->get();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


      // function slugRouteBinding
      public function getRouteKeyName()
      {
          return 'slug';
      }
}
