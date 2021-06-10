<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;

class UpdateServiceSettingsFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'about' => 'required|string',
            'user_agreement' => 'required|string',
            'user_agreement_points' => 'required|string',
        ];
    }
}
