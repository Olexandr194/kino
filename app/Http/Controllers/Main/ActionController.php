<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\ActionImages;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaHallImage;
use App\Models\CinemaImages;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Carbon\Carbon;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::all();
        return view('main.home.actions', compact('actions'));
    }

    public function single_action($id)
    {
        $action = Action::where('id', $id)->first();
        $images = ActionImages::where('action_id', $id)->get();

        return view('main.home.single_action', compact('action', 'images'));
    }

}
