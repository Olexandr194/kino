<?php

namespace App\Http\Requests\Admin\MailingList;

use Illuminate\Foundation\Http\FormRequest;

class UsersListRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'user_id' => 'required',
        ];
    }
}
