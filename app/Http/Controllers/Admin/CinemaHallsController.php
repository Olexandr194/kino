<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CinemaHallImagesStoreRequest;
use App\Http\Requests\Admin\CinemaHallImagesUpdateRequest;
use App\Http\Requests\Admin\CinemaHallStoreRequest;
use App\Http\Requests\Admin\CinemaHallUpdateRequest;
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

        if (isset($data['image'])) {
            $images = $data['image'];
            unset($data['image']);
        }

        $hall['scheme'] = Storage::disk('public')->put('/images', $hall['scheme']);
        $hall['main_image'] = Storage::disk('public')->put('/images', $hall['main_image']);
        $data = CinemaHall::firstOrCreate($hall);

        if (isset($images)) {
            foreach ($images as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $hall_images = new CinemaHallImage;
                $hall_images->image = $image;
                $hall_images->cinema_hall_id = $data->id;
                $hall_images->save();
            }
        }

        return redirect()->route('admin.cinemas.create');
    }

    public function edit(CinemaHall $cinema_hall)
    {
        $images = CinemaHallImage::all()->where('cinema_hall_id', $cinema_hall->id);

        foreach ($images as $item) {
            $image[] = $item->image;
        }

        return view('admin.cinema_halls.edit', compact('cinema_hall', 'image'));
    }

    public function update(CinemaHallUpdateRequest $request, $id, CinemaHallImagesUpdateRequest $reqImages)
    {
        $data = $request->validated();
        $new_images = $reqImages->validated();
        $hall = CinemaHall::where('id', $id)->first();

        if (isset($new_images['image'])) {

            $updateImages = $new_images['image'];
            unset($new_images['image']);
        }

        if (isset ($data['scheme'])) {
            $data['scheme'] = Storage::disk('public')->put('/images', $data['scheme']);
        } else {
            $data['scheme'] = $hall['scheme'];
        }
        if (isset ($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        } else {
            $data['main_image'] = $hall['main_image'];
        }
        $hall->update($data);

        if (isset($updateImages)) {
            foreach ($updateImages as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $hall_images = new CinemaHallImage();
                $hall_images->image = $image;
                $hall_images->cinema_hall_id = $hall->id;
                $hall_images->save();
            }
        }

        return redirect()->route('admin.cinemas.create');
    }

}
