<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaImages extends Model
{
    protected $table = 'cinema_images';
    protected $guarded = false;

    public function cinemas()
    {
        return $this->belongsTo(Cinema::class, 'cinema_id', 'id');
    }
}
