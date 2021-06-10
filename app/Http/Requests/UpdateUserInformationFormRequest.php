<?php

namespace App\Http\Requests;

class UpdateUserInformationFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'avatar' => 'nullable',
            'nickname' => 'string|nullable'
        ];
    }
}
