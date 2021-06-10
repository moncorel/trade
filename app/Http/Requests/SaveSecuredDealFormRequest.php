<?php

namespace App\Http\Requests;

use App\Models\SecuredDeal;
use App\Models\Wallet;
use Illuminate\Validation\Rule;

class SaveSecuredDealFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'deal_type' => [
                'required',
                Rule::in([SecuredDeal::BUYER_TYPE, SecuredDeal::SELLER_TYPE])
            ],
            'second_party_nickname' => 'required|string',
            'deal_conditions' => 'required|string',
            'deadline' => 'required',
            'currency' => [
                'required',
                'string',
                Rule::in([Wallet::BTC_TYPE, Wallet::BCH_TYPE, Wallet::ETH_TYPE])
            ],
            'amount' => 'required|numeric|min:0.01',
            'deal_password' => 'required_if:type,' . SecuredDeal::BUYER_TYPE
        ];
    }
}
