<?php

namespace App\Http\Requests\Admin\Actions;

use Illuminate\Foundation\Http\FormRequest;

class ActionsUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'nullable|file',
            'link' => 'required|url',
            'status' => 'nullable',
            'date' => 'required',
            'seo_url' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'action_id' => 'nullable',
        ];
    }
}
