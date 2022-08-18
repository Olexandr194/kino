<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Carbon\Carbon;

class SoonController extends Controller
{
    public function soon()
    {
        $soon = ScheduleModel::all();

        foreach ($soon as $schedule) {
            $v[] = $schedule['movie_id'];
        }
        $keys = array_unique($v);
        foreach ($keys as $key) {
            $movies[] = Movie::where('id', $key)->where('seo_url', '!=', 'poster')->get();
        }

        foreach ($movies as $movie)
        {
            foreach ($movie as $m)
            {
                $m->seo_url = 'soon';
                $m->update();
            }
        }

        $soon = Movie::where('seo_url', 'soon')->get();

        foreach ($soon as $movie)
        {
            $schedule = ScheduleModel::where('movie_id', $movie->id)->get();
        }



        return view('main.home.soon', compact('soon', 'schedule'));
    }
}
