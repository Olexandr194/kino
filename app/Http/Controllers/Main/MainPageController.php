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
        $now_movies = Movie::where('seo_url', 'now')->get();
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
        foreach ($movies as $movie) {
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
        }
        return view('main.home.index', compact('top_banners', 'bottom_banners', 'main_banner', 'movies', 'now_movies', 'soon_movies', 'date'));
    }

    public function poster()
    {
        $movies = Movie::where('seo_url', 'now')->get();

        return view('main.home.poster', compact('movies'));
    }

    public function soon()
    {
        $soon_movies = Movie::where('seo_url', 'soon')->get();

        foreach ($soon_movies as $movie)
        {
            $date = Carbon::createFromDate($movie->schedules->min('date'));
        }
        return view('main.home.soon', compact('soon_movies', 'date'));
    }

    public function movie(Movie $movie)
    {
        $all_schedules = ScheduleModel::where('movie_id', $movie->id)->get();

        foreach ($all_schedules as $schedule) {
            $v[] = $schedule['cinema_id'];
        }
        $keys = array_unique($v);
        foreach ($keys as $key) {
            $cinemas[] = Cinema::where('id', $key)->get();
        }

        $schedules = ScheduleModel::where('movie_id', $movie->id)
            ->where('date', date('Y-m-d'))
            ->where('cinema_id', $cinemas[0][0]['id'])
            ->get();

        /*---------Вивід дати----------*/
        $day = date('d');
        $month = date('m');
        $year = date('Y');

        for ($i = 0; $i < 7; $i++) {
            $date[] = Carbon::createFromDate($year, $month, $day + $i);
        }
        /*---------Вивід дати----------*/

        $images = MovieImages::where('movie_id', $movie->id)->get();

        return view('main.home.movie', compact('movie', 'schedules', 'cinemas', 'date', 'images'));
    }

    public function schedules_search(Request $request, $id)
    {

        if ($request->type == 'Всі')
        {
            $schedules = ScheduleModel::where('movie_id', $id)
                ->where('cinema_id', $request->cinema_id)
                ->where('date', $request->date)
                ->get();
        }
        else {
            $schedules = ScheduleModel::where('movie_id', $id)
                ->where('cinema_id', $request->cinema_id)
                ->where('date', $request->date)
                ->where('type', $request->type)
                ->get();
        }

        if ($request->ajax()) {
            return view('main.home.movie_ajax', compact('schedules'))->render();
        }

        return view('main.home.movie', compact('schedules'));
    }


}
