<?php

namespace App\Http\Requests\Admin\Banners;

use Illuminate\Foundation\Http\FormRequest;

class BottomBannerUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'bottom_image' => 'nullable|array',
            'bottom_url' => 'nullable|array',
            'bottom_text' => 'nullable|array',
            'bottom_scroll_time' => 'nullable',
        ];
    }
}
