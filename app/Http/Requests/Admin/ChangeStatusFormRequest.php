<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;
use App\Models\Transaction;
use Illuminate\Validation\Rule;

class ChangeStatusFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'status' => [
                Rule::in([
                    Transaction::PROCESSING_STATUS,
                    Transaction::APPROVED_STATUS,
                    Transaction::FAILED_STATUS
                ])
            ],
            'transaction_id' => 'required|integer'
        ];
    }
}
