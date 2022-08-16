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

    public function schedules_search(Request $request)
    {
        if (isset($request->cinema_hall_id) and (isset($request->date))) {
            $schedules = ScheduleModel::where('cinema_id', $request->cinema_id)
                ->where('cinema_hall_id', $request->cinema_hall_id)
                ->where('date', $request->date)
                ->get();
        } elseif (isset($request->cinema_hall_id)) {
            $schedules = ScheduleModel::where('cinema_id', $request->cinema_id)
                ->where('cinema_hall_id', $request->cinema_hall_id)
                ->get();
        } elseif (isset($request->date)) {
            $schedules = ScheduleModel::where('date', $request->date)
                ->get();
        } else {
            $schedules = ScheduleModel::where('cinema_id', $request->cinema_id)->get();
        }

        if ($request->ajax()) {
            return view('admin.schedules.ajax_schedules', compact('schedules'))->render();
        }

        return view('admin.schedules.create', compact('schedules'));
    }
}
