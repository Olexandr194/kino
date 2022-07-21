<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CinemaHallImagesStoreRequest;
use App\Http\Requests\Admin\CinemaHallStoreRequest;
use App\Http\Requests\Admin\CinemaStoreRequest;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaHallImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CinemaHallsController extends Controller
{

    public function create()
    {

        return view('admin.cinema_halls.create');
    }

    public function store(CinemaHallStoreRequest $request, CinemaHallImagesStoreRequest $reqImages)
    {
        $hall = $request->validated();
        $data = $reqImages->validated();
        $images = $data['image'];

        $hall['scheme'] = Storage::disk('public')->put('/images', $hall['scheme']);
        $hall['main_image'] = Storage::disk('public')->put('/images', $hall['main_image']);
        $data = CinemaHall::firstOrCreate($hall);

        foreach($images as $image)
        {
            Storage::disk('public')->put('/images', $image);
            $hall_images = new CinemaHallImage;
            $hall_images->image = $image->hashName();
            $hall_images->cinema_hall_id = $data->id;
            $hall_images->save();
        }

        return redirect()->route('admin.cinemas.create');
    }


}
