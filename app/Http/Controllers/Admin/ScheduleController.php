<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Schedules\ScheduleStoreRequest;
use App\Http\Requests\Admin\Schedules\ScheduleUpdateRequest;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{

    public function index()
    {
        $cinemas = Cinema::all();
        $movies = Movie::all();
        $schedules = ScheduleModel::all();
        $date = ScheduleModel::orderBy('date', 'ASC')->get()->groupBy('date')->all();

        return view('admin.schedules.index', compact('cinemas', 'schedules', 'date', 'movies'));
    }

    public function create()
    {
        $cinemas = Cinema::all();
        $movies = Movie::all();
        return view('admin.schedules.create', compact('cinemas', 'movies'));
    }

    public function cinema_search(Request $request)
    {
        $cinema_halls = CinemaHall::where('cinema_id', 'Like', '%' . $request->search . '%')->get();

        if ($request->ajax()) {
            return view('admin.schedules.cinema_search', compact('cinema_halls'))->render();
        }

        return view('admin.schedules.create', compact('cinema_halls'));
    }

    public function store(ScheduleStoreRequest $request)
    {
        $data = $request->validated();
        $dates = explode(',', $data['date']);

        foreach ($dates as $date) {
            $data['date'] = date("Y-m-d", strtotime($date));
            $schedule = ScheduleModel::firstOrCreate($data);
        }

        return redirect()->route('admin.schedules.index');
    }

    public function index_search(Request $request)
    {
        $cinema_id = $request->cinema_id;
        $cinema_hall_id = $request->cinema_hall_id;
        $date = $request->date;
        $movie_id = $request->movie_id;

        $schedules = ScheduleModel::where('cinema_id', 'Like', '%' . $cinema_id . '%')
            ->where('cinema_hall_id', 'Like', '%' . $cinema_hall_id . '%')
            ->where('date', 'Like', '%' . $date . '%')
            ->where('movie_id', 'Like', '%' . $movie_id . '%')
            ->get();

        if ($request->ajax()) {
            return view('admin.schedules.ajax_schedules', compact('schedules'))->render();
        }

        return view('admin.schedules.create', compact('schedules'));
    }

    public function hall_search(Request $request)
    {
        $cinema_halls = CinemaHall::where('cinema_id', $request->search)->get();

        if ($request->ajax()) {
            return view('admin.schedules.ajax_cinema_halls', compact('cinema_halls'))->render();
        }

        return view('admin.schedules.create', compact('cinema_halls'));
    }

    /* public function date_search(Request $request)
     {
         $schedules = ScheduleModel::where('cinema_hall_id', $request->cinema_hall_id)->get();

         if ($request->ajax()) {
             return view('admin.schedules.ajax_date', compact('schedules'))->render();
         }

         return view('admin.schedules.create', compact('schedules'));
     }*/

    public function edit(ScheduleModel $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(ScheduleUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $schedule = ScheduleModel::where('id', $id)->first();
        $schedule->update($data);

        return redirect()->route('admin.schedules.index');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        if (ScheduleModel::where('id', $id)->exists()) {
            $schedule = ScheduleModel::where('id', $id)->first();
            $schedule->delete();
        }
        $schedules = ScheduleModel::all();

        if ($request->ajax()) {
            return view('admin.schedules.ajax_schedules', compact('schedules'))->render();
        }
        return view('admin.schedules.index', compact('schedules'));
    }

}
