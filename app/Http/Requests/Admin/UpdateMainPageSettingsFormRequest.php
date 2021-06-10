<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\AuthorizedFormRequest;

class UpdateMainPageSettingsFormRequest extends AuthorizedFormRequest
{
    public function rules()
    {
        return [
            'protection_advantage' => 'required|string',
            'safety_advantage' => 'string',
            'support_advantage' => 'string',
            'stability_advantage' => 'string',
            'main_welcome_header' => 'string',
            'main_welcome_desc' => 'string',
            'main_secured_deal' => 'string',
            'main_trading' => 'string'
        ];
    }
}
