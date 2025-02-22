<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = ['image', 'title', 'tagline', 'user_id'];
    protected $table = 'carousels';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
