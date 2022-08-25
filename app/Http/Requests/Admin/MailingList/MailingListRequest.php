<?php

namespace App\Http\Requests\Admin\MailingList;

use Illuminate\Foundation\Http\FormRequest;

class MailingListRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required',
            'mailing_list' => 'required',
        ];
    }
}
