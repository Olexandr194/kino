<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';
    protected $guarded = false;

    public function cinemas()
    {
        return $this->belongsToMany(Cinema::class, 'cinema_actions', 'action_id', 'cinema_id');
    }
}
