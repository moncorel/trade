<?php

namespace App\Http\Requests;

class SendMessageFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'message' => 'required'
        ];
    }
}
