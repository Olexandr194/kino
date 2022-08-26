<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\NewsImagesStoreRequest;
use App\Http\Requests\Admin\News\NewsImagesUpdateRequest;
use App\Http\Requests\Admin\News\NewsStoreRequest;
use App\Http\Requests\Admin\News\NewsUpdateRequest;
use App\Models\Cinema;
use App\Models\CinemaNews;
use App\Models\News;
use App\Models\NewsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $cinemas = Cinema::all();
        return view('admin.news.create', compact('cinemas'));
    }

    public function store(NewsStoreRequest $request, NewsImagesStoreRequest $imgRequest)
    {
        $data = $request->validated();
        $imgData = $imgRequest->validated();
        if (isset($data['cinema_ids']))
        {
            $cinema_ids = $data['cinema_ids'];
            unset($data['cinema_ids']);
        }

        if(!isset($data['status'])) {
            $data['status'] = 'Не опубліковано';
        }

        if (isset($imgData['image'])) {
            $images = $imgData['image'];
            unset($imgData['image']);
        }

        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $news = News::firstOrCreate($data);
        $news->cinemas()->attach($cinema_ids);

        if (isset($images)) {
            foreach ($images as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $news_images = new NewsImages();
                $news_images->image = $image;
                $news_images->news_id = $news->id;
                $news_images->save();
            }
        }
        return redirect()->route('admin.news.index');
    }

    public function edit(News $news)
    {
        $images = NewsImages::all()->where('news_id', $news->id);
        $cinemas = Cinema::all();

        foreach ($images as $item) {
            $image[] = $item->image;
            $id[] = $item->id;
        }
        if(!isset($image))
        {
            $image[] = 0;
            $id[] = 0;
        }

        return view('admin.news.edit', compact('news', 'image', 'id', 'cinemas'));
    }

    public function update(NewsUpdateRequest $request, NewsImagesUpdateRequest $imgRequest, $id)
    {
        $data = $request->validated();
        $new_images = $imgRequest->validated();
        if (isset($data['cinema_ids']))
        {
            $cinema_ids = $data['cinema_ids'];
            unset($data['cinema_ids']);
        }
        $news = News::where('id', $id)->first();

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
            $data['main_image'] = $news['main_image'];
        }
        $news->update($data);
        $news->cinemas()->sync($cinema_ids);

        if (isset($updateImages)) {
            foreach ($updateImages as $image) {
                $image = Storage::disk('public')->put('/images', $image);
                $news_image = new NewsImages();
                $news_image->image = $image;
                $news_image->news_id = $news->id;
                $news_image->save();
            }
        }
        return redirect()->route('admin.news.index');
    }

    public function destroy_news(Request $request)
    {
        $id = $request->input('id');

        if (News::where('id', $id)->exists()) {
            $news = News::where('id', $id)->first();
            $cinema_ids = CinemaNews::where('news_id', $id)->get();
            foreach ($cinema_ids as $id)
            {
                $id->delete();
            }
            $news->delete();
        }
        $news = News::orderBy('created_at', 'DESC')->get();

        if ($request->ajax()) {
            return view('admin.ajax.delete_news', compact('news'))->render();
        }
        return view('admin.news.index', compact('news'));
    }

    public function destroy_image(Request $request, News $news)
    {
        $id = $request->input('id');

        if (NewsImages::where('id', $id)->exists()) {
            $image = NewsImages::where('id', $id)->first();
            $image->delete();
        }
        $images = NewsImages::all()->where('news_id', $news->id);

        foreach ($images as $item) {
            $image[] = $item->image;
            $id[] = $item->id;
        }

        if ($request->ajax()) {
            return view('admin.news.delete_news_image', compact('image', 'id', 'news'))->render();
        }

        return view('admin.movies.edit', compact('image', 'id','news'));
    }

}
