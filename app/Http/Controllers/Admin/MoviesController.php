<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Movies\MovieImagesStoreRequest;
use App\Http\Requests\Admin\Movies\MovieImagesUpdateRequest;
use App\Http\Requests\Admin\Movies\MoviesStoreRequest;
use App\Http\Requests\Admin\Movies\MoviesUpdateRequest;
use App\Models\Movie;
use App\Models\MovieImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{

    public function index()
    {
        $movies = Movie::orderBy('created_at', 'DESC')->paginate(9);
        $movies_soon = Movie::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.movies.index', compact('movies', 'movies_soon'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(MoviesStoreRequest $request, MovieImagesStoreRequest $imgRequest)
    {
        $data = $request->validated();
        $imgData = $imgRequest->validated();

        if (isset($imgData['image'])) {
            $images = $imgData['image'];
            unset($imgData['image']);
        }

        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $movie = Movie::firstOrCreate($data);

        if (isset($images)) {
            foreach ($images as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $movie_images = new MovieImages();
                $movie_images->image = $image;
                $movie_images->movie_id = $movie->id;
                $movie_images->save();
            }
        }
        return redirect()->route('admin.movies.index');
    }

    public function edit(Movie $movie)
    {
        $images = MovieImages::all()->where('movie_id', $movie->id);

        foreach ($images as $item) {
            $image[] = $item->image;
        }

        return view('admin.movies.edit', compact('movie', 'image'));
    }

    public function update(MoviesUpdateRequest $request, MovieImagesStoreRequest $imgRequest, $id)
    {
        $data = $request->validated();
        $new_images = $imgRequest->validated();
        $movie = Movie::where('id', $id)->first();

        if (isset($new_images['image'])) {
            $updateImages = $new_images['image'];
            unset($new_images['image']);
        }

        if (isset ($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        } else {
            $data['main_image'] = $movie['main_image'];
        }
        $movie->update($data);

        if (isset($updateImages)) {
            foreach ($updateImages as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $movie_image = new MovieImages();
                $movie_image->image = $image;
                $movie_image->movie_id = $movie->id;
                $movie_image->save();
            }
        }
        return redirect()->route('admin.movies.index');
    }

    public function destroy_movie(Request $request)
    {
        $id = $request->input('id');

        if (Movie::where('id', $id)->exists()) {
            $movie = Movie::where('id', $id)->first();
           /* $cinema_hall_images = CinemaHallImage::where('cinema_hall_id', $cinema_hall->id)->get();
            foreach ($cinema_hall_images as $image) {
                $image->delete();
            }*/
            $movie->delete();
        }
        $movies = Movie::orderBy('created_at', 'DESC')->paginate(9);
        $movies_soon = Movie::orderBy('created_at', 'DESC')->paginate(5);
        if ($request->ajax()) {
            return view('admin.ajax.delete_movie', compact('movies', 'movies_soon'))->render();
        }
        return view('admin.movies.index', compact('movies', 'movies_soon'));
    }
}
