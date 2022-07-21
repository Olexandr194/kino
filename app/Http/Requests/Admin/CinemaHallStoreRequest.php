<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CinemaHallStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'number' => 'required',
            'description' => 'required',
            'scheme' => 'required|file',
            'main_image' => 'required|file',
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'cinema_id' => 'nullable',
        ];
    }
}
