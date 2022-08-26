<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'nullable|file',
            'link' => 'required|url',
            'status' => 'nullable',
            'date' => 'required',
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'news_id' => 'nullable',
            'cinema_ids' => 'nullable|array',
            'cinema_ids.*' => 'nullable|exists:cinemas,id',
        ];
    }
}
