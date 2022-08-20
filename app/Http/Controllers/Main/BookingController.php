<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(ScheduleModel $schedule)
    {
        $cinema_hall = CinemaHall::where('id', $schedule->cinema_hall_id)->first();
        $movie = Movie::where('id', $schedule->movie_id)->first();

        return view('main.home.booking', compact('schedule', 'cinema_hall', 'movie'));
    }

    public function book(Request $request)
    {
        $seats_id = $request->seats_id;
        $rows_id = $request->rows_id;
        $quantity = $request->quantity;


        return view('main.home.booking');
    }


    }
