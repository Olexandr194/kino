<?php

namespace App\Http\Requests\Admin\Movies;

use Illuminate\Foundation\Http\FormRequest;

class MovieImagesUpdateRequest extends FormRequest
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
