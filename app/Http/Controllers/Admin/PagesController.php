<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\ContactsPageStoreRequest;
use App\Http\Requests\Admin\Pages\ContactsPageUpdateRequest;
use App\Http\Requests\Admin\Pages\MainPageUpdateRequest;
use App\Http\Requests\Admin\Pages\PageImagesStoreRequest;
use App\Http\Requests\Admin\Pages\PageImagesUpdateRequest;
use App\Http\Requests\Admin\Pages\PagesStoreRequest;
use App\Http\Requests\Admin\Pages\PagesUpdateRequest;
use App\Models\Cinema;use App\Models\ContactPage;use App\Models\MainPage;
use App\Models\Page;
use App\Models\PageImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        $main_page = MainPage::where('id', 1)->first();
        $contact_page = ContactPage::orderBy('created_at', 'DESC')->first();
        return view('admin.pages.index', compact('main_page', 'pages', 'contact_page'));
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
        return view('admin.pages.create');
    }

    public function store(PagesStoreRequest $request, PageImagesStoreRequest $imgRequest)
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
        $page = Page::firstOrCreate($data);

        if (isset($images)) {
            foreach ($images as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $page_images = new PageImages();
                $page_images->image = $image;
                $page_images->page_id = $page->id;
                $page_images->save();
            }
        }
        return redirect()->route('admin.pages.index');
    }

    public function edit(Page $page)
    {
        $images = PageImages::all()->where('page_id', $page->id);
        foreach ($images as $item) {
            $image[] = $item->image;
        }

        return view('admin.pages.edit', compact('page', 'image'));
    }

    public function update(PagesUpdateRequest $request, PageImagesUpdateRequest $imgRequest, $id)
    {
        $data = $request->validated();
        $new_images = $imgRequest->validated();
        $page = Page::where('id', $id)->first();

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
            $data['main_image'] = $page['main_image'];
        }
        $page->update($data);

        if (isset($updateImages)) {
            foreach ($updateImages as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $page_images = new PageImages();
                $page_images->image = $image;
                $page_images->page_id = $page->id;
                $page_images->save();
            }
        }
        return redirect()->route('admin.pages.index');
    }

    public function contact_page_index()
    {
        $contacts = ContactPage::all();
        return view('admin.pages.contacts_page_index', compact('contacts'));
    }

    public function contact_page_create()
    {

        return view('admin.pages.contacts_page_create');
    }

    public function contact_page_store(ContactsPageStoreRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = Storage::disk('public')->put('/images', $data['logo']);
        $data['main'] = Storage::disk('public')->put('/images', $data['main']);
        $contact = ContactPage::firstOrCreate($data);

        return redirect()->route('admin.pages.contact_page_index');
    }

    public function contact_page_edit(ContactPage $contactPage)
    {
        return view('admin.pages.contacts_page_edit', compact('contactPage'));
    }

    public function contact_page_update(ContactsPageUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $contact_page = ContactPage::where('id', $id)->first();

        if (isset ($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/images', $data['logo']);
        } else {
            $data['logo'] = $contact_page['logo'];
        }
        if (isset ($data['main'])) {
            $data['main'] = Storage::disk('public')->put('/images', $data['main']);
        } else {
            $data['main'] = $contact_page['main'];
        }
        $contact_page->update($data);

        return redirect()->route('admin.pages.contact_page_index');
    }

    public function destroy_contact_page(Request $request)
    {
        $id = $request->input('id');

        if (ContactPage::where('id', $id)->exists()) {
            $page = ContactPage::where('id', $id)->first();
            $page->delete();
        }
        $contacts = ContactPage::all();

        if ($request->ajax()) {
            return view('admin.ajax.contact_page', compact('contacts'))->render();
        }
        return redirect()->route('admin.pages.contact_page_index');
    }

    public function destroy_page(Request $request)
    {
        $id = $request->input('id');

        if (Page::where('id', $id)->exists()) {
            $page = Page::where('id', $id)->first();
            $page->delete();
        }
        $pages = Page::all();
        $main_page = MainPage::where('id', 1)->first();
        $contact_page = ContactPage::orderBy('created_at', 'DESC')->first();

        if ($request->ajax()) {
            return view('admin.ajax.delete_page', compact('pages', 'main_page', 'contact_page'))->render();
        }
        return view('admin.pages.index', compact('pages'));
    }

}
