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
        $poster = ScheduleModel::orderBy('date', 'ASC')->get()->groupBy('date')->take(7);
        $all = ScheduleModel::orderBy('date', 'DESC')->get()->groupBy('date')->all();
        $soon = ScheduleModel::orderBy('date', 'DESC')->get()->groupBy('date')->take(count($all)-count($poster));

        foreach ($soon as $schedule) {
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
                $m->seo_url = 'soon';
                $m->update();
            }
        }

        $soon = Movie::where('seo_url', 'soon')->get();

        return view('main.home.soon', compact('soon'));
    }
}
