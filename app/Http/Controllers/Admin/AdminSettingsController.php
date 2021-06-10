<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Settings\Common\UpdateCommonSettingsAction;
use App\Actions\Admin\Settings\MainPage\UpdateMainPageSettingsAction;
use App\Actions\Admin\Settings\MainPage\UpdateMainPageSettingsRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCommonSettingsRequest;
use App\Http\Requests\Admin\UpdateMainPageSettingsFormRequest;
use App\Http\Requests\Admin\UpdateServiceSettingsFormRequest;
use App\Models\Setting;

class AdminSettingsController extends Controller
{
    private UpdateCommonSettingsAction $updateCommonSettingsAction;
    private UpdateMainPageSettingsAction $updateMainPageSettingsAction;

    public function __construct(
        UpdateCommonSettingsAction $updateCommonSettingsAction,
        UpdateMainPageSettingsAction $updateMainPageSettingsAction
    ) {
        $this->updateCommonSettingsAction = $updateCommonSettingsAction;
        $this->updateMainPageSettingsAction = $updateMainPageSettingsAction;
    }

    public function index()
    {
        $settings = [
            'address' => Setting::getSetting(Setting::ADDRESS),
            'email' => Setting::getSetting(Setting::EMAIL),
            'withdrawMessage' => Setting::getSetting(Setting::WITHDRAW_MESSAGE),
            'tradingMessage' => Setting::getSetting(Setting::TRADING_MESSAGE),
            'securedDealWarning' => Setting::getSetting(Setting::SECURED_DEAL_WARNING),
            'minDepositAmount' => Setting::getSetting(Setting::MINIMUM_DEPOSIT_AMOUNT),
            'minWithdrawAmount' => Setting::getSetting(Setting::MINIMUM_WITHDRAW_AMOUNT),
            'minTransferAmount' => Setting::getSetting(Setting::MINIMUM_TRANSFER_AMOUNT),
            'transferCommission' => Setting::getSetting(Setting::TRANSFER_COMMISSION),
            'contactUsHeader' => Setting::getSetting(Setting::CONTACT_US_HEADER),
            'contactUsText' => Setting::getSetting(Setting::CONTACT_US_TEXT),
            'paymentHeader' => Setting::getSetting(Setting::PAYMENT_HEADER),
            'paymentText' => Setting::getSetting(Setting::PAYMENT_TEXT),
        ];

        return view('admin.settings', $settings);
    }

    public function mainPageSettings()
    {
        return view('admin.settings-main', [
            'mainWelcomeDescription' => Setting::getSetting(Setting::WELCOME_DESCRIPTION),
            'mainWelcomeHeader' => Setting::getSetting(Setting::WELCOME_HEADER),
            'protectionAdvantage' => Setting::getSetting(Setting::PROTECTION_ADVANTAGE),
            'safetyAdvantage' => Setting::getSetting(Setting::SAFETY_ADVANTAGE),
            'supportAdvantage' => Setting::getSetting(Setting::SUPPORT_ADVANTAGE),
            'stabilityAdvantage' => Setting::getSetting(Setting::STABILITY_ADVANTAGE),
            'mainTradingDesc' => Setting::getSetting(Setting::TRADING_DESCRIPTION),
            'securedDealDesc' => Setting::getSetting(Setting::SECURED_DEAL_DESCRIPTION),
        ]);
    }

    public function updateCommonSettings(UpdateCommonSettingsRequest $request)
    {
        $this->updateCommonSettingsAction->execute(
            new \App\Actions\Admin\Settings\Common\UpdateCommonSettingsRequest(
                $request->file('logotype'),
                $request->address,
                $request->email,
                $request->withdraw_message,
                $request->trading_message,
                (float)$request->min_deposit_amount,
                (float)$request->min_withdraw_amount,
                (float)$request->min_transfer_amount,
                (float)$request->transfer_commission,
                $request->secured_deal_warning,
                $request->contact_us_header,
                $request->contact_us_text,
                $request->payment_header,
                $request->payment_text,
            )
        );

        return redirect(route('admin.settings'))
            ->with('success', "Settings successfully updated!");
    }

    public function updateMainPageSettings(UpdateMainPageSettingsFormRequest $request)
    {
        $this->updateMainPageSettingsAction->execute(
            new UpdateMainPageSettingsRequest(
                trim($request->main_welcome_header),
                trim($request->main_welcome_desc),
                trim($request->protection_advantage),
                trim($request->safety_advantage),
                trim($request->support_advantage),
                trim($request->stability_advantage),
                trim($request->main_secured_deal),
                trim($request->main_trading),
            )
        );

        return redirect()
            ->back()
            ->with('success', "Main Page Settings successfully updated!");
    }

    public function servicePageSettings()
    {
        return view('admin.settings-service', [
            'aboutSettings' => Setting::getSetting(Setting::ABOUT),
            'userAgreement' => Setting::getSetting(Setting::USER_AGREEMENT),
            'userAgreementPoints' => Setting::getSetting(Setting::USER_AGREEMENT_POINTS),
        ]);
    }

    public function updateServiceSettings(UpdateServiceSettingsFormRequest $request)
    {
        Setting::updateOrCreate(
            ['name' => Setting::ABOUT],
            ['value' => trim($request->about)]
        );


        Setting::updateOrCreate(
            ['name' => Setting::USER_AGREEMENT],
            ['value' => $request->user_agreement],
        );

        Setting::updateOrCreate(
            ['name' => Setting::USER_AGREEMENT_POINTS],
            ['value' => $request->user_agreement_points],
        );

        return redirect()->back()
            ->with("success", "Settings was successfully updated!");
    }
}
