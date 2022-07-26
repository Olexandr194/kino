<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function schedule()
    {
        $cinemas = Cinema::all();
        $movies = Movie::all();

        /*---------Вивід дати----------*/
        $day = date('d');
        $month = date('m');
        $year = date('Y');

        for ($i = 0; $i < 7; $i++) {
            $date[] = Carbon::createFromDate($year, $month, $day + $i);
        }
        /*---------Вивід дати----------*/

        $schedules = ScheduleModel::orderBy('date', 'ASC')->orderBy('time', 'ASC')->get()->groupBy('date')->take(7);

        return view('main.home.schedule', compact('cinemas', 'movies', 'schedules', 'date'));
    }

    public function cinema_halls_search(Request $request)
    {
        $cinema_halls = CinemaHall::where('cinema_id', $request->cinema_id)->get();

        if ($request->ajax()) {
            return view('main.ajax.cinema_halls', compact('cinema_halls'))->render();
        }

        return view('main.home.schedule', compact('cinema_halls'));
    }

    public function filter(Request $request)
    {
        $cinema_id = $request->cinema_id;
        $cinema_hall_id = $request->cinema_hall_id;
        $movies = $request->movies;
        $date = $request->date;
        $type = $request->type;

        if (isset($date))
        {
            $schedules = ScheduleModel::where('cinema_id', 'Like', '%'.$cinema_id.'%')
                ->where('cinema_hall_id', 'Like', '%'.$cinema_hall_id.'%')
                ->where('movie_id', 'Like', '%'.$movies.'%')
                ->where('type', 'Like', '%'.$type.'%')
                ->where('date', Carbon::createFromDate($date)->format('Y-m-d'))
                ->orderBy('time', 'ASC')->get()->groupBy('date')->all();
        } else {
            $schedules = ScheduleModel::where('cinema_id', 'Like', '%' . $cinema_id . '%')
                ->where('cinema_hall_id', 'Like', '%' . $cinema_hall_id . '%')
                ->where('movie_id', 'Like', '%' . $movies . '%')
                ->where('type', 'Like', '%' . $type . '%')
                ->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get()->groupBy('date')->take(7);
        }

            if ($request->ajax()) {
                return view('main.ajax.schedules', compact('schedules'))->render();
            }

            return view('main.home.schedule', compact('schedules'));
        }
    }
