<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;

class UpdateWalletsFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'btc_address' => 'required|string',
            'eth_address' => 'required|string',
            'bch_address' => 'required|string',
            'btc_amount' => 'required|min:0|numeric',
            'eth_amount' => 'required|min:0|numeric',
            'bch_amount' => 'required|min:0|numeric',
        ];
    }
}
