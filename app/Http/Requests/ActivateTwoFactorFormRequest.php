<?php

namespace App\Http\Requests;

class ActivateTwoFactorFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'auth_method' => 'required|string'
        ];
    }
}
