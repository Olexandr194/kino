<?php

namespace App\Http\Requests\Admin\CinemaHalls;

use Illuminate\Foundation\Http\FormRequest;

class CinemaHallImagesUpdateRequest extends FormRequest
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
