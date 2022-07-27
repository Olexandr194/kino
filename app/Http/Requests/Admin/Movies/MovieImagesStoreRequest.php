<?php

namespace App\Http\Requests\Admin\Movies;

use Illuminate\Foundation\Http\FormRequest;

class MovieImagesStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image' => 'required|array',
            'image.*' => 'file',
        ];
    }
}
