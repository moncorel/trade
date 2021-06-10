<?php

namespace App\Http\Controllers;

use App\Actions\Personal\Settings\UpdateInformationAction;
use App\Actions\Personal\Settings\UpdateInformationRequest;
use App\Actions\Personal\Settings\UpdatePasswordAction;
use App\Actions\Personal\Settings\UpdatePasswordRequest;
use App\Http\Requests\ActivatePromocodeFormRequest;
use App\Http\Requests\ActivateTwoFactorFormRequest;
use App\Http\Requests\DisableTwoFactorFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Http\Requests\UpdateUserInformationFormRequest;
use App\Models\User;
use App\Services\TwoFactorAuthService;
use BotMan\BotMan\BotMan;
use BotMan\Drivers\Telegram\TelegramDriver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

final class SettingsController extends Controller
{
    private UpdateInformationAction $updateInformationAction;
    private UpdatePasswordAction $updatePasswordAction;
    private TwoFactorAuthService $twoFactorService;

    public function __construct(
        UpdateInformationAction $updateInformationAction,
        UpdatePasswordAction $updatePasswordAction
    ) {
        $this->updateInformationAction = $updateInformationAction;
        $this->updatePasswordAction = $updatePasswordAction;
    }

    public function index()
    {
        return view('personal.settings');
    }

    public function updateInformation(UpdateUserInformationFormRequest $request)
    {
        $this->updateInformationAction->execute(
            new UpdateInformationRequest(
                $request->nickname,
                $request->file('avatar')
            )
        );

        return redirect(route('settings'));
    }

    public function updatePassword(UpdatePasswordFormRequest $request)
    {
        $this->updatePasswordAction->execute(
            new UpdatePasswordRequest(
                $request->previous_password,
                $request->new_password,
                $request->new_password_confirmation
            )
        );

        return redirect(route('settings'));
    }

    public function activateTwoFactorAuth(ActivateTwoFactorFormRequest $request)
    {
        $user = Auth::user();
        $code = rand(100000, 999999);
        $user->two_factor_code = $code;
        $user->two_factor_method = $request->auth_method;
        $user->save();

        return redirect(route('settings'))->with([
            'modal' => 'two_factor',
            'code' => $code
        ]);
    }

    public function sendDisableTwoFactorAuthCode()
    {
        $user = Auth::user();
        $this->twoFactorService->sendCodeToTelegram($user, TwoFactorAuthService::DISABLE_CODE);

        return redirect(route('settings'))
            ->with('modal', 'two_factor_disable');
    }

    public function disableTwoFactorAuth(DisableTwoFactorFormRequest $request)
    {
        $user = User::where('two_factor_code', '=', $request->code)->first();

        if (!$user) {
            return redirect(route('settings')
            )->with('modal', 'two_factor_disable')
                ->withErrors([
                    'code' => "Wrong code!"
                ]);
        }

        $user->two_factor_active = false;
        $user->two_factor_code = null;
        $user->two_factor_method = null;
        $user->save();

        return redirect(route('settings'))
            ->with([
                'modal' => 'two_factor_disable',
                'two_factor_disable_success' => true
            ]);
    }

    public function activatePromocode(ActivatePromocodeFormRequest $request)
    {
        return redirect(route('settings'))
            ->with('modal', 'promocode_not_found');
    }
}
