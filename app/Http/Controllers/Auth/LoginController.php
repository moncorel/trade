<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\TwoFactorAuthService;
use BotMan\Drivers\Telegram\TelegramDriver;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your personal screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as parentLogin;
    }

    private TwoFactorAuthService $twoFactorAuthService;

    protected $redirectTo = RouteServiceProvider::PERSONAL;

    public function __construct(TwoFactorAuthService $twoFactorAuthService)
    {
        $this->middleware('guest')->except('logout');
        $this->twoFactorAuthService = $twoFactorAuthService;
    }

    public function login(Request $request)
    {
        $errors = $this->validateLogin($request)->errors()->toArray();

        if (count($errors)) {
            $request->flash();
            return redirect()->back()
                ->with('modal', 'login')
                ->withErrors($errors);
        }

        $credentials = $request->only('nickname', 'password');

        $userExists = User::where('nickname', '=', $request->nickname)->first();

        if ($userExists && Hash::check($request->password, $userExists->password)) {
            if ($userExists->two_factor_active) {
                $this->twoFactorAuthService->sendCodeToTelegram($userExists, TwoFactorAuthService::CONFIRM_CODE);

                return redirect()
                    ->back()
                    ->with([
                        'modal' => 'two_factor_confirm',
                        'nickname' => $request->nickname,
                        'password' => $request->password
                    ]);
            }

            if (Auth::attempt($credentials)) {
                return redirect(route('personal'));
            }
        }

        $request->flash();
        return redirect()->back()->with('modal', 'login')->withErrors([
            $this->username() => [trans('auth.failed')]
        ]);
    }

    public function validateLogin(Request $request)
    {
        $credentials = $request->only('nickname', 'password');
        return Validator::make($credentials, [
            'nickname' => 'required|string',
            'password' => 'required|string|min:8'
        ]);
    }

    public function username()
    {
        return 'nickname';
    }

    public function showLoginForm()
    {
        return redirect('/')->with('modal', 'login');
    }
}
