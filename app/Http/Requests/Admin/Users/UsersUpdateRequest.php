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
            'name' => 'nullable',
            'surname' => 'nullable',
            'nickname' => 'nullable',
            'address' => 'nullable',
            'email' => 'nullable|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'nullable|integer|exists:users,id',
            'password' => 'nullable',
            'card_number' => 'nullable',
            'language' => 'nullable',
            'sex' => 'nullable',
            'phone' => 'nullable',
            'birthday' => 'nullable',
            'city' => 'nullable',
            'role' => 'nullable',
        ];
    }
}
