<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
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
            'main_image' => 'required|file',
            'link' => 'required|url',
            'status' => 'nullable',
            'date' => 'required',
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'news_id' => 'nullable',
        ];
    }
}
