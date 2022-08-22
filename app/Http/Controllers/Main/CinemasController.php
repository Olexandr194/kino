<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaHallImage;
use App\Models\CinemaImages;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Carbon\Carbon;

class CinemasController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::all();
        return view('main.home.cinemas', compact('cinemas'));
    }

    public function single_cinema($id)
    {
        $cinema = Cinema::where('id', $id)->first();
        $images = CinemaImages::where('cinemas_id', $cinema->id)->get();
        $cinema_halls = CinemaHall::where('cinema_id', $id)->get();
        $schedules = ScheduleModel::where('cinema_id', $id)->where('date', date('Y-m-d'))->orderBy('time', 'ASC')->get();
        return view('main.home.single_cinema', compact('cinema', 'images', 'cinema_halls', 'schedules'));
    }

    public function cinema_hall($id)
    {
        $cinema_hall = CinemaHall::where('id', $id)->first();
        $schedules = ScheduleModel::where('cinema_hall_id', $id)->where('date', date('Y-m-d'))->orderBy('time', 'ASC')->get();
        $images = CinemaHallImage::where('cinema_hall_id', $id)->get();

        return view('main.home.cinema_hall', compact('cinema_hall','schedules', 'images'));
    }
}
