<?php

namespace App\Http\Requests\Admin\Movies;

use Illuminate\Foundation\Http\FormRequest;

class MoviesStoreRequest extends FormRequest
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
            'trailer_url' => 'required|url',
            'type' => 'required',
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'cinema_id' => 'nullable',
        ];
    }
}
