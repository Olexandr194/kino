<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\ActionImages;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaHallImage;
use App\Models\CinemaImages;
use App\Models\Movie;
use App\Models\News;
use App\Models\NewsImages;
use App\Models\ScheduleModel;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('main.home.news', compact('news'));
    }

    public function single_news($id)
    {
        $news = News::where('id', $id)->first();
        $images = NewsImages::where('news_id', $id)->get();

        return view('main.home.single_news', compact('news', 'images'));
    }

}
