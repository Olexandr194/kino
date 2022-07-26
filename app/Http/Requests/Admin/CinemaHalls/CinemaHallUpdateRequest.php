<?php

namespace App\Http\Requests\Admin\CinemaHalls;

use Illuminate\Foundation\Http\FormRequest;

class CinemaHallUpdateRequest extends FormRequest
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
            'scheme' => 'nullable|file',
            'main_image' => 'nullable|file',
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'cinema_id' => 'nullable',
        ];
    }
}
