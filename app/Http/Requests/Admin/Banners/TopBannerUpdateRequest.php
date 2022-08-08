<?php

namespace App\Http\Requests\Admin\Banners;

use Illuminate\Foundation\Http\FormRequest;

class TopBannerUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image' => 'nullable|array',
            'url' => 'nullable|array',
            'text' => 'nullable|array',
            'top_scroll_time' => 'nullable',
        ];
    }
}
