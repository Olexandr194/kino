<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHall extends Model
{
    protected $table = 'cinema_halls';
    protected $guarded = false;

    public function cinema_hall_images()
    {
        return $this->hasMany(CinemaHallImage::class, 'cinema_hall_id', 'id');
    }
}
