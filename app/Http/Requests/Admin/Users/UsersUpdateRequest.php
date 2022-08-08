<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'nickname' => 'required',
            'address' => 'required',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'password' => 'required',
            'card_number' => 'nullable',
            'language' => 'required',
            'sex' => 'required',
            'phone' => 'nullable',
            'birthday' => 'nullable',
            'city' => 'nullable',
            'role' => 'required',
        ];
    }
}
