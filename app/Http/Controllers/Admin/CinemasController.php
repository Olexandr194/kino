<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CinemaStoreRequest;
use App\Models\Cinema;
use App\Models\CinemaHall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CinemasController extends Controller
{

    public function index()
    {
        return view('admin.cinemas.index');
    }

    public function create()
    {
        $cinema_halls = CinemaHall::all()->where('cinema_id', null);
        return view('admin.cinemas.create', compact('cinema_halls'));
    }

    public function store(CinemaStoreRequest $request)
    {
        $data = $request->validated();
        $data['logo_image'] = Storage::disk('public')->put('/images', $data['logo_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $cinema = Cinema::firstOrCreate($data);

        $cinema_halls = CinemaHall::all()->where('cinema_id', null);
        foreach ($cinema_halls as $hall)
        {
            $hall->cinema_id = $cinema->id;
            $hall ->save();
        }

        return redirect()->route('admin.cinemas.index');
    }

    public function destroy_hall(Request $request) {
        $id = $request->input('id');

       if (CinemaHall::where('id', $id)->exists()) {
            $cinema_hall = CinemaHall::where('id', $id)->first();
            $cinema_hall->delete();
        }
        $cinema_halls = CinemaHall::where('cinema_id', null)->get();
        if ($request->ajax()) {
            return view('admin.ajax.delete_hall', compact('cinema_halls'))->render();
        }
        return view('admin.cinemas.create', compact('cinema_halls'));

    }


}
