<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\BottomBanner;
use App\Models\MainBanner;
use App\Models\Movie;
use App\Models\TopBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainPageController extends Controller
{

    public function index()
    {
        $top_banners = TopBanner::all();
        $bottom_banners = BottomBanner::all();
        $main_banner = MainBanner::where('id', 1)->first();
        $movies = Movie::all();

        return view('main.home.index', compact('top_banners', 'bottom_banners', 'main_banner', 'movies'));
    }

    public function poster()
    {
        $movies = Movie::all();

        return view('main.home.poster', compact('movies'));
    }

    public function soon()
    {
        $movies = Movie::all();

        return view('main.home.soon', compact('movies'));
    }





}
