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
        foreach ($schedules as $schedule)
        {
            if ($schedule->date < date('Y-m-d'))
            {
                $schedule->delete();
            }
        }

        /*--------------------------Визначаю статус фільму-----------------------*/
        /*foreach ($movies as $movie) {
            $schedule = ScheduleModel::where('movie_id', $movie->id)->get();
            foreach ($schedule as $sch)
            {
                $v[] = $sch['date'];
            }
            $min = min($v);

            if ($min == date('Y-m-d'))
            {
                $movie->seo_url = 'now';
            }
            elseif ($min > date('Y-m-d'))
            {
                $movie->seo_url = 'soon';
            }
            else{
                $movie->seo_url = 'none';
            }
            $movie->update();
        }*/

        return view('main.home.index', compact('top_banners', 'bottom_banners', 'main_banner', 'movies', 'now_movies', 'soon_movies', 'date'));
    }
}
