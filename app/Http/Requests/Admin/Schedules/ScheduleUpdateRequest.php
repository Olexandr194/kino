<?php

namespace App\Http\Requests\Admin\Schedules;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'type' => 'required',
            'date' => 'nullable',
            'time' => 'required',
            'new_date' => 'nullable',
            'cost' => 'required',
            'cinema_id' => 'nullable',
            'movie_id' => 'nullable',
            'cinema_hall_id' => 'nullable',
        ];
    }
}
