<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\BottomBanner;
use App\Models\Cinema;
use App\Models\MainBanner;
use App\Models\Movie;
use App\Models\MovieImages;
use App\Models\ScheduleModel;
use App\Models\TopBanner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainPageController extends Controller
{

    public function index()
    {
        $now_movies = Movie::where('seo_url', 'poster')->get();
        $soon_movies = Movie::where('seo_url', 'soon')->get();
        $top_banners = TopBanner::all();
        $bottom_banners = BottomBanner::all();
        $main_banner = MainBanner::where('id', 1)->first();
        $movies = Movie::all();
        $schedules = ScheduleModel::all();
        $date = Carbon::createFromDate();

        /*--------------------------Видаляю старі розклади-----------------------*/
        foreach ($schedules as $schedule) {
            if ($schedule->date < date('Y-m-d')) {
                $schedule->delete();
            }
        }
        /*--------------------------Змінюю старі статуси-----------------------*/

        foreach ($schedules as $schedule) {
            $v[] = $schedule['movie_id'];
        }
        $k_s = array_unique($v);

        foreach ($movies as $movie) {
            $v[] = $movie['id'];
        }
        $k_m = array_unique($v);
        $test = array_diff($k_m, $k_s);

        foreach ($test as $t) {
            $movies_o[] = Movie::where('id', $t)->get();
        }
        foreach ($movies_o as $movie)
        {
            foreach ($movie as $m)
            {
                $m->seo_url = 'old';
                $m->update();
            }
        }

        return view('main.home.index', compact('top_banners', 'bottom_banners', 'main_banner', 'movies', 'now_movies', 'soon_movies', 'date'));
    }
}
