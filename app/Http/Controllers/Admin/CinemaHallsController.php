<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CinemaStoreRequest;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CinemaHallsController extends Controller
{

    public function index()
    {
        return view('admin.cinema_halls.index');
    }


}
