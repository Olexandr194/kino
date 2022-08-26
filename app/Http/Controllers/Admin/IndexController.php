<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleModel;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke()
    {
        $schedules = ScheduleModel::orderBy('date', 'ASC')->get()->groupBy('date')->take(14);
        $users = User::all();
        $men = User::where('sex', 'Чоловік')->get();
        $women = User::where('sex', 'Жінка')->get();
        $else = User::where('sex', null)->get();


        return view('admin.main', compact('users', 'men', 'women', 'else', 'schedules'));
    }
}
/*public function index()
{
    $users = User::all();

    $bookings = Booking::all();

    foreach ($bookings as $booking) {

        if ($booking->getUser->gender == 'man') {
            $allManUsers[] = $booking->getUser->id;
        } else {
            $allWomanUsers[] = $booking->getUser->id;
        }
    }

    $sessions = Schedule::all()->groupBy('date')->toArray();

    $dates = DeviceType::all()->groupBy('date')->toArray();
    $mobiles = DeviceType::where('type', 'mobile')->get()->groupBy('date')->toArray();
    $desktops = DeviceType::where('type', 'desktop')->get()->groupBy('date')->toArray();

    if (isset($allManUsers)) {
        $manUsers = count($allManUsers) / count($bookings) * 100;
        $womanUsers = count($allWomanUsers) / count($bookings) * 100;

        return view('admin.main.index',
            compact('users', 'manUsers', 'womanUsers', 'sessions', 'dates', 'mobiles', 'desktops')
        );

    }

    return view('admin.main.index', compact('users', 'sessions', 'dates', 'mobiles', 'desktops'));
}*/
