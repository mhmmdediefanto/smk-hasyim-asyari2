<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsFront extends Model
{
    protected $table = "settings_fronts";
    protected $fillable = ['title', 'image_header', 'image_footer', 'width'];
}
