<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    protected $guarded = false;

    public function schedules(){
        return $this->hasMany(ScheduleModel::class, 'movie_id', 'id');
    }
}
