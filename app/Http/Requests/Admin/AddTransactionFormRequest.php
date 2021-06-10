<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AddTransactionFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:0',
            'type' => [
                'required', 'string',
                Rule::in([Transaction::WITHDRAW_TYPE, Transaction::DEPOSIT_TYPE, Transaction::TRANSFER_TYPE])
            ],
            'currency_type' => [
                'required', 'string',
                Rule::in([Wallet::BTC_TYPE, Wallet::BCH_TYPE, Wallet::ETH_TYPE])
            ],
            'status' => [
                'required', 'string',
                Rule::in([Transaction::PROCESSING_STATUS, Transaction::APPROVED_STATUS, Transaction::FAILED_STATUS])
            ],
            'sender_nickname' => 'string|nullable|required_if:type,'.Transaction::TRANSFER_TYPE,
            'receiver_nickname' => 'string|nullable|required_if:type,'.Transaction::TRANSFER_TYPE,
            'external_address' => 'required_if:type,'.Transaction::WITHDRAW_TYPE
        ];
    }
}
