<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\MovieImages;
use App\Models\ScheduleModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieController extends Controller
{
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
