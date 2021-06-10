<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;

class SaveUserFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'nickname' => 'required|string|unique:users',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'btc_amount' => 'required|min:0',
            'eth_amount' => 'required|min:0',
            'bch_amount' => 'required|min:0',
        ];
    }
}
