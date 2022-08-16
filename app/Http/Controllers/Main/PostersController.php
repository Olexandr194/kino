<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\ScheduleModel;

class PostersController extends Controller
{
    public function poster()
    {
        $schedules = ScheduleModel::orderBy('date', 'ASC')->get()->groupBy('date')->take(7);

        foreach ($schedules as $schedule) {
            foreach ($schedule as $value)
            {
                $v[] = $value['movie_id'];
            }
        }
        $keys = array_unique($v);
        foreach ($keys as $key) {
            $movies[] = Movie::where('id', $key)->get();
        }
        foreach ($movies as $movie)
        {
            foreach ($movie as $m)
            {
                $m->seo_url = 'poster';
                $m->update();
            }
        }

        $poster = Movie::where('seo_url', 'poster')->get();

        return view('main.home.poster', compact('poster'));
    }
}
