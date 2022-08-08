<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banners\BottomBannerUpdateRequest;
use App\Http\Requests\Admin\Banners\MainBannerUpdateRequest;
use App\Http\Requests\Admin\Banners\TopBannerUpdateRequest;
use App\Models\BottomBanner;
use App\Models\MainBanner;
use App\Models\TopBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{

    public function index()
    {
        $top_banners = TopBanner::all();
        $bottom_banners = BottomBanner::all();
        $main_banner = MainBanner::where('id', 1)->first();
        return view('admin.banners.index', compact('top_banners', 'bottom_banners', 'main_banner'));
    }

    public function top_update(TopBannerUpdateRequest $request)
    {
        $data = $request->validated();
        $top_banners = TopBanner::all();

        if($data['url'][count($top_banners)] == null or $data['image'][count($top_banners)]== null or $data['text'][count($top_banners)]== null)
        {
            $count = count($top_banners);
        } else {
            $count = count($top_banners)+1;
        }

        for ($i = 0; $i < $count; $i++) {
            if (isset($top_banners[$i])) {
                if (isset ($data['image'][$i])) {
                    $top_banners[$i]['image'] = Storage::disk('public')->put('/images', $data['image'][$i]);
                } else {
                    $top_banners[$i]['image'] = $top_banners[$i]['image'];
                }
                $top_banners[$i]['url'] = $data['url'][$i];
                $top_banners[$i]['text'] = $data['text'][$i];
                $top_banners[$i]['top_scroll_time'] = $data['top_scroll_time'] ?? 5000;
                $top_banners[$i]->update();
            } else {
                $top_banner = new TopBanner();
                $top_banner['image'] = Storage::disk('public')->put('/images', $data['image'][$i]);
                $top_banner['url'] = $data['url'][$i];
                $top_banner['text'] = $data['text'][$i];
                $top_banner['top_scroll_time'] = $data['top_scroll_time'] ?? 5000;
                $top_banner->save();
            }
        }
        return redirect()->route('admin.banners.index');
    }

    public function destroy_top_banner(Request $request)
    {
        $id = $request->input('id');

        if (TopBanner::where('id', $id)->exists()) {
            $top_banner = TopBanner::where('id', $id)->first();
            $top_banner->delete();
        }
        $top_banners = TopBanner::all();

        if ($request->ajax()) {
            return view('admin.ajax.top_banner', compact('top_banners'))->render();
        }
        return view('admin.news.index', compact('top_banners'));
    }

    public function bottom_update(BottomBannerUpdateRequest $request)
    {
        $data = $request->validated();
        $bottom_banners = BottomBanner::all();

        if($data['bottom_url'][count($bottom_banners)] == null or $data['bottom_image'][count($bottom_banners)]== null or $data['bottom_text'][count($bottom_banners)]== null)
        {
            $count = count($bottom_banners);
        } else {
            $count = count($bottom_banners)+1;
        }

        for ($i = 0; $i < $count; $i++) {
            if (isset($bottom_banners[$i])) {
                if (isset ($data['bottom_image'][$i])) {
                    $bottom_banners[$i]['bottom_image'] = Storage::disk('public')->put('/images', $data['bottom_image'][$i]);
                } else {
                    $bottom_banners[$i]['bottom_image'] = $bottom_banners[$i]['bottom_image'];
                }
                $bottom_banners[$i]['bottom_url'] = $data['bottom_url'][$i];
                $bottom_banners[$i]['bottom_text'] = $data['bottom_text'][$i];
                $bottom_banners[$i]['bottom_scroll_time'] = $data['bottom_scroll_time'] ?? 5000;
                $bottom_banners[$i]->update();
            } else {
                $bottom_banner = new BottomBanner();
                $bottom_banner['bottom_image'] = Storage::disk('public')->put('/images', $data['bottom_image'][$i]);
                $bottom_banner['bottom_url'] = $data['bottom_url'][$i];
                $bottom_banner['bottom_text'] = $data['bottom_text'][$i];
                $bottom_banner['bottom_scroll_time'] = $data['bottom_scroll_time'] ?? 5000;
                $bottom_banner->save();
            }
        }
        return redirect()->route('admin.banners.index');
    }

    public function destroy_bottom_banner(Request $request)
    {
        $id = $request->input('id');

        if (BottomBanner::where('id', $id)->exists()) {
            $bottom_banner = BottomBanner::where('id', $id)->first();
            $bottom_banner->delete();
        }
        $bottom_banners = BottomBanner::all();

        if ($request->ajax()) {
            return view('admin.ajax.bottom_banner', compact('bottom_banners'))->render();
        }
        return view('admin.news.index', compact('bottom_banners'));
    }

    public function main_update(MainBannerUpdateRequest $request)
    {
        $data = $request->validated();
        $main_banner = MainBanner::where('id', 1)->first();
        if (isset ($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        } else {
            $data['main_image'] = $main_banner['main_image'];
        }
        $main_banner->update($data);

        return redirect()->route('admin.banners.index');
    }

}
