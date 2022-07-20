<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CinemaStoreRequest;
use App\Models\Cinema;
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
        return view('admin.cinemas.create');
    }

    public function store(CinemaStoreRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $data['logo_image'] = Storage::disk('public')->put('/images', $data['logo_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

        Cinema::firstOrCreate($data);
        return redirect()->route('admin.cinemas.index');
    }

}
