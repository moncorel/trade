<?php

namespace App\Http\Requests;

use App\Constants\TransactionConstants;
use App\Models\Setting;
use App\Models\Wallet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDepositFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $minDepositAmount = (float)Setting::getSetting(Setting::MINIMUM_DEPOSIT_AMOUNT);
        return [
            'amount' => 'required|min:' . $minDepositAmount,
            'currency' => [
                'required',
                'string',
                Rule::in([Wallet::ETH_TYPE, Wallet::BCH_TYPE, Wallet::BTC_TYPE]),
            ]
        ];
    }
}
