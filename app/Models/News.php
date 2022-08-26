<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = false;

    public function cinemas()
    {
        return $this->belongsToMany(Cinema::class, 'cinema_news', 'news_id', 'cinema_id');
    }
}
