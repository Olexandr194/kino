<?php

namespace App\Http\Requests\Admin\Schedules;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'type' => 'required',
            'date' => 'required',
            'time' => 'required',
            'new_date' => 'nullable',
            'cost' => 'required',
            'cinema_id' => 'required',
            'movie_id' => 'required',
            'cinema_hall_id' => 'required',
        ];
    }
}
