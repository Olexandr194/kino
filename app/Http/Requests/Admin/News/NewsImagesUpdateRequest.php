<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsImagesUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image' => 'nullable|array',
            'image.*' => 'file',
        ];
    }
}
