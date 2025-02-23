<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogVisitBerita extends Model
{
    protected $table = 'log_visit_beritas';
    protected $fillable = ['berita_id', 'url', 'user_ip', 'user_agent', 'visited_at'];

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
}
