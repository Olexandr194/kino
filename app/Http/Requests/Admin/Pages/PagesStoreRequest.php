<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class PagesStoreRequest extends FormRequest
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
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'news_id' => 'nullable',
        ];
    }
}
