<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;
use App\Models\Transaction;
use Illuminate\Validation\Rule;

class UpdateTransactionFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'transaction_id' => 'required|integer',
            'amount' => 'required|numeric|min:0',
            'status' => [
                'required', 'string',
                Rule::in([
                    Transaction::APPROVED_STATUS, Transaction::FAILED_STATUS, Transaction::PROCESSING_STATUS
                ])
            ],
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'with_commission' => 'numeric|nullable'
        ];
    }
}
