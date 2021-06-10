<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;

class UpdateUserFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'nickname' => 'required|string',
            'email' => 'required|email',
            'new_password' => 'string|nullable|min:8|confirmed'
        ];
    }
}
