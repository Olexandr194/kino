<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\ActionImages;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaHallImage;
use App\Models\CinemaImages;
use App\Models\ContactPage;
use App\Models\Movie;
use App\Models\Page;
use App\Models\PageImages;
use App\Models\ScheduleModel;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function pages($id)
    {
        $page = Page::where('id', $id)->first();
        $images = PageImages::where('page_id', $id)->get();

        return view('main.home.about_cinema', compact('page', 'images'));
    }

    public function contact_page()
    {
        $pages = ContactPage::all();

        return view('main.home.contact_page', compact('pages'));
    }

}
