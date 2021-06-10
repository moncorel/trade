<?php

namespace App\Http\Requests;

class DisableTwoFactorFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'code' => 'required|string'
        ];
    }
}
