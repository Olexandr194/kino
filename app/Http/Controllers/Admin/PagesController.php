<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Actions\PageImagesStoreRequest;
use App\Http\Requests\Admin\Actions\PageImagesUpdateRequest;
use App\Http\Requests\Admin\Actions\ActionsStoreRequest;
use App\Http\Requests\Admin\Actions\PagesUpdateRequest;
use App\Http\Requests\Admin\News\NewsImagesStoreRequest;
use App\Http\Requests\Admin\News\NewsImagesUpdateRequest;
use App\Http\Requests\Admin\News\NewsStoreRequest;
use App\Http\Requests\Admin\News\NewsUpdateRequest;
use App\Http\Requests\Admin\Pages\MainPageStoreRequest;
use App\Http\Requests\Admin\Pages\MainPageUpdateRequest;
use App\Models\Action;
use App\Models\ActionImages;
use App\Models\MainPage;
use App\Models\News;
use App\Models\NewsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{

    public function index()
    {
        $main_page = MainPage::where('id', 1)->first();
        return view('admin.pages.index', compact('main_page'));
    }

    public function main_page_edit()
    {
        $main_page = MainPage::where('id', 1)->first();
        return view('admin.pages.edit_main_page', compact('main_page'));
    }

    public function main_page_update(MainPageUpdateRequest $request)
    {
        $data = $request->validated();
        if(!isset($data['status'])) {
            $data['status'] = 'Не опубліковано';
        }
        $main_page = MainPage::where('id', 1)->first();
        $main_page->update($data);

        return redirect()->route('admin.pages.index');
    }

    public function create()
    {
        return view('admin.actions.create');
    }

    public function store(ActionsStoreRequest $request, PageImagesStoreRequest $imgRequest)
    {
        $data = $request->validated();
        $imgData = $imgRequest->validated();

        if(!isset($data['status'])) {
            $data['status'] = 'Не опубліковано';
        }

        if (isset($imgData['image'])) {
            $images = $imgData['image'];
            unset($imgData['image']);
        }

        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $action = Action::firstOrCreate($data);

        if (isset($images)) {
            foreach ($images as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $action_images = new ActionImages();
                $action_images->image = $image;
                $action_images->action_id = $action->id;
                $action_images->save();
            }
        }
        return redirect()->route('admin.actions.index');
    }

    public function edit(Action $action)
    {
        $images = ActionImages::all()->where('action_id', $action->id);
        foreach ($images as $item) {
            $image[] = $item->image;
        }

        return view('admin.actions.edit', compact('action', 'image'));
    }

    public function update(PagesUpdateRequest $request, PageImagesUpdateRequest $imgRequest, $id)
    {
        $data = $request->validated();
        $new_images = $imgRequest->validated();
        $action = Action::where('id', $id)->first();

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