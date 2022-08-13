<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedules';
    protected $guarded = false;

    public function cinema(){
        return $this->belongsTo(Cinema::class, 'cinema_id', 'id');
    }

    public function cinema_hall(){
        return $this->belongsTo(CinemaHall::class, 'cinema_hall_id', 'id');
    }

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}


