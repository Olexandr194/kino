<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class MainPageUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'phone1' => 'required',
            'phone2' => 'required',
            'phone3' => 'nullable',
            'status' => 'nullable',
            'seo_text' => 'required',
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
        ];
    }
}
