<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthController extends Controller
{
    public function confirm(Request $request)
    {
        $credentials = $request->only('nickname', 'password');

        $user = User::where('nickname', '=', $request->nickname)
            ->where('two_factor_code', '=', $request->confirm_code)->first();

        if ($user && Auth::attempt($credentials)) {
            return redirect(route('personal'));
        }

        return redirect()
            ->back()
            ->with([
                'nickname' => $request->nickname,
                'password' => $request->password,
                'modal' => 'two_factor_confirm'
            ])
            ->withErrors([
                'confirm_code' => 'Wrong confirmation code!',
            ]);
    }
}
