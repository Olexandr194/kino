<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinemas\CinemaImagesStoreRequest;
use App\Http\Requests\Admin\Cinemas\CinemaStoreRequest;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaHallImage;
use App\Models\CinemaImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CinemasController extends Controller
{

    public function index()
    {
        $cinemas = Cinema::all();
        return view('admin.cinemas.index', compact('cinemas'));
    }

    public function create()
    {
        $cinema_halls = CinemaHall::where('cinema_id', null)->get();
        return view('admin.cinemas.create', compact('cinema_halls'));
    }

    public function store(CinemaStoreRequest $request, CinemaImagesStoreRequest $imagesRequest)
    {
        $cinema = $request->validated();
        $storeImages = $imagesRequest->validated();

        if (isset($storeImages['image'])) {
            $images = $storeImages['image'];
            unset($storeImages['image']);
        }

        $cinema['logo_image'] = Storage::disk('public')->put('/images', $cinema['logo_image']);
        $cinema['main_image'] = Storage::disk('public')->put('/images', $cinema['main_image']);
        $cinema = Cinema::firstOrCreate($cinema);

        $cinema_halls = CinemaHall::all()->where('cinema_id', null);
        foreach ($cinema_halls as $hall) {
            $hall->cinema_id = $cinema->id;
            $hall->save();
        }

        if (isset($images)) {
            foreach ($images as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $cinema_images = new CinemaImages();
                $cinema_images->image = $image;
                $cinema_images->cinemas_id = $cinema->id;
                $cinema_images->save();
            }
        }

        return redirect()->route('admin.cinemas.index');
    }

    public function destroy_hall(Request $request)
    {
        $id = $request->input('id');

        if (CinemaHall::where('id', $id)->exists()) {
            $cinema_hall = CinemaHall::where('id', $id)->first();
            $cinema_hall_images = CinemaHallImage::where('cinema_hall_id', $cinema_hall->id)->get();
            foreach ($cinema_hall_images as $image) {
                $image->delete();
            }
            $cinema_hall->delete();
        }
        $cinema_halls = CinemaHall::where('cinema_id', null)->get();
        if ($request->ajax()) {
            return view('admin.ajax.delete_hall', compact('cinema_halls'))->render();
        }
        return view('admin.cinemas.create', compact('cinema_halls'));

    }

    public function show($id)
    {
        $cinema = Cinema::where('id', $id)->first();
        $cinema_images = CinemaImages::all()->where('cinemas_id', $id);
        $cinema_halls = CinemaHall::all()->where('cinema_id', $id);
        return view('admin.cinemas.show', compact('cinema', 'cinema_images', 'cinema_halls'));
    }

    public function destroy_cinema(Request $request)
    {
        $id = $request->input('id');

        if (Cinema::where('id', $id)->exists()) {
            $cinema = Cinema::where('id', $id)->first();
            $cinema_images =  CinemaImages::where('cinemas_id', $cinema->id)->get();
            foreach ($cinema_images as $image) {
                $image->delete();
            }
            $cinema_hall = CinemaHall::all()->where('cinema_id', $cinema->id);
            foreach ($cinema_hall as $hall){
                $cinema_hall_images = CinemaHallImage::where('cinema_hall_id', $hall->id)->get();
                foreach ($cinema_hall_images as $image) {
                    $image->delete();
                }
                $hall->delete();
            }
            $cinema->delete();
        }

        $cinemas = Cinema::all();
        if ($request->ajax()) {
            return view('admin.ajax.delete_cinema', compact('cinemas'))->render();
        }

        return view('admin.cinemas.index', compact('cinemas'));
    }


}
