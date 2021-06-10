<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;

class UpdateCommonSettingsRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'logotype' => 'mimes:jpg,jpeg,png|file|max:2048|nullable',
            'address' => 'string|nullable',
            'email' => 'string|nullable',
            'withdraw_message' => 'required|string|max:255',
            'trading_message' => 'required|string',
            'secured_deal_warning' => 'required|string',
            'min_deposit_amount' => 'required|numeric|min:0',
            'min_withdraw_amount' => 'required|numeric|min:0',
            'min_transfer_amount' => 'required|numeric|min:0',
            'transfer_commission' => 'required|numeric|min:0',
            'contact_us_header' => 'required|string|max:255',
            'contact_us_text' => 'required|string',
            'payment_header' => 'required|string|max:255',
            'payment_text' => 'required|string',
        ];
    }
}
