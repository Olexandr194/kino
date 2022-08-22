<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(ScheduleModel $schedule)
    {
        $cinema_hall = CinemaHall::where('id', $schedule->cinema_hall_id)->first();
        $movie = Movie::where('id', $schedule->movie_id)->first();
        $booking = Booking::where('schedule_id', $schedule->id)->get();
        $user = Auth::id();

        return view('main.home.booking', compact('schedule', 'cinema_hall', 'movie', 'booking', 'user'));
    }

    public function book(Request $request)
    {
        $seats_id = $request->seats_id;
        $rows_id = $request->rows_id;
        $quantity = $request->quantity;
        $id = $request->id;

        for ($i=0; $i<$quantity; $i++) {
            $booking = new Booking();
            $booking->user_id = Auth::id();
            $booking->schedule_id = $id;
            $booking->row = $rows_id[$i];
            $booking->seat = $seats_id[$i];
            $booking->save();
        }
        return redirect()->route('main.main_page');
    }


    }
