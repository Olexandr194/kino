<?php

namespace App\Http\Requests\Admin\CinemaHalls;

use Illuminate\Foundation\Http\FormRequest;

class CinemaHallImagesStoreRequest extends FormRequest
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
