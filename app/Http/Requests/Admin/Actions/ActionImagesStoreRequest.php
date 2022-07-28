<?php

namespace App\Http\Requests\Admin\Actions;

use Illuminate\Foundation\Http\FormRequest;

class ActionImagesStoreRequest extends FormRequest
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
