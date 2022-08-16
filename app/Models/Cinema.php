<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $table = 'cinemas';
    protected $guarded = false;

    public function cinema_halls(){
        return $this->hasMany(CinemaHall::class, 'cinema_id', 'id');
    }
}
