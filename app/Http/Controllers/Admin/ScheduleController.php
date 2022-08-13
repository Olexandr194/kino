<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Schedules\ScheduleStoreRequest;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\ScheduleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{

    public function index()
    {
        $cinemas = Cinema::all();
        $schedules = ScheduleModel::all();

        return view('admin.schedules.index', compact('cinemas', 'schedules'));
    }

    public function create()
    {
        $cinemas = Cinema::all();
        $movies = Movie::all();
        return view('admin.schedules.create', compact('cinemas', 'movies'));
    }

    public function cinema_search(Request $request)
    {
        $cinema_halls = CinemaHall::where('cinema_id', 'Like', '%'.$request->search.'%')->get();

        if ($request->ajax()) {
            return view('admin.schedules.cinema_search', compact('cinema_halls'))->render();
        }

        return view('admin.schedules.create', compact('cinema_halls'));
    }

    public function store(ScheduleStoreRequest $request)
    {
        $data = $request->validated();
        $dates = explode(',', $data['date']);

        foreach ($dates as $date)
        {
            $data['date'] = date( "Y-m-d", strtotime( $date ) );
            $schedule = ScheduleModel::firstOrCreate($data);
        }

        return redirect()->route('admin.schedules.index');
    }



















    public function edit(Action $action)
    {
        $images = ActionImages::all()->where('action_id', $action->id);
        foreach ($images as $item) {
            $image[] = $item->image;
        }

        return view('admin.actions.edit', compact('action', 'image'));
    }

    public function update(ActionsUpdateRequest $request, ActionImagesUpdateRequest $imgRequest, $id)
    {
        $data = $request->validated();
        $new_images = $imgRequest->validated();
        $action = Action::where('id', $id)->first();

        if(!isset($data['status'])) {
            $data['status'] = 'Не опубліковано';
        }

        if (isset($new_images['image'])) {
            $updateImages = $new_images['image'];
            unset($new_images['image']);
        }

        if (isset ($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        } else {
            $data['main_image'] = $action['main_image'];
        }
        $action->update($data);

        if (isset($updateImages)) {
            foreach ($updateImages as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $action_image = new ActionImages();
                $action_image->image = $image;
                $action_image->action_id = $action->id;
                $action_image->save();
            }
        }
        return redirect()->route('admin.actions.index');
    }

    public function destroy_action(Request $request)
    {
        $id = $request->input('id');

        if (Action::where('id', $id)->exists()) {
            $action = Action::where('id', $id)->first();
            $action->delete();
        }
        $actions = Action::orderBy('created_at', 'DESC')->get();

        if ($request->ajax()) {
            return view('admin.ajax.delete_action', compact('actions'))->render();
        }
        return view('admin.actions.index', compact('actions'));
    }

}
