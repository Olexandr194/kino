<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHallImage extends Model
{
    protected $table = 'cinema_hall_images';
    protected $guarded = false;

    public function cinema_halls()
    {
        return $this->belongsTo(CinemaHall::class, 'cinema_hall_id', 'id');
    }
}
