<?php

namespace App\Http\Requests\Admin\Actions;

use Illuminate\Foundation\Http\FormRequest;

class ActionImagesUpdateRequest extends FormRequest
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
