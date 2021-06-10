<?php

namespace App\Http\Requests;

use App\Constants\TransactionConstants;
use App\Models\Setting;
use App\Models\Wallet;
use Illuminate\Validation\Rule;

class CreateWithdrawFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        $minWithdrawAmount = (float)Setting::getSetting(Setting::MINIMUM_WITHDRAW_AMOUNT);
        return [
            'external_address' => 'required|string',
            'amount' => 'required|min:' . $minWithdrawAmount,
            'currency' => [
                'required',
                'string',
                Rule::in([Wallet::BTC_TYPE, Wallet::BCH_TYPE, Wallet::ETH_TYPE]),
            ]
        ];
    }
}
