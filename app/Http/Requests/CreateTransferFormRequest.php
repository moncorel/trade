<?php

namespace App\Http\Requests;

use App\Models\Setting;
use App\Models\Wallet;
use Illuminate\Validation\Rule;

class CreateTransferFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        $minTransferAmount = (float)Setting::getSetting(Setting::MINIMUM_TRANSFER_AMOUNT);
        return [
            'address' => 'required|string',
            'currency' => [
                Rule::in([Wallet::ETH_TYPE, Wallet::BCH_TYPE, Wallet::BTC_TYPE]),
                'required',
                'string'
            ],
            'amount' => 'required|min:' . $minTransferAmount
        ];
    }
}
