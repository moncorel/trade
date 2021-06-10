<?php

namespace App\Actions\Admin\Settings\Common;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

final class UpdateCommonSettingsAction
{
    public function execute(UpdateCommonSettingsRequest $request)
    {
        if ($request->getLogotype()) {
            $logotypeFile = $request->getLogotype();

            Storage::putFileAs(
                Setting::FILES_DIRECTORY,
                $logotypeFile,
                Setting::LOGOTYPE_NAME
            );

            Setting::updateOrCreate(
                ['name' => Setting::LOGOTYPE],
                ['image_link' => Setting::LOGOTYPE_NAME]
            );
        }

        if ($request->getAddress()) {
            Setting::updateOrCreate(
                ['name' => Setting::ADDRESS],
                ['value' => $request->getAddress()]
            );
        }

        if ($request->getEmail()) {
            Setting::updateOrCreate(
                ['name' => Setting::EMAIL],
                ['value' => $request->getEmail()]
            );
        }

        Setting::updateOrCreate(
            ['name' => Setting::WITHDRAW_MESSAGE],
            ['value' => $request->getWithdrawMessage()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::TRADING_MESSAGE],
            ['value' => $request->getTradingMessage()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::MINIMUM_DEPOSIT_AMOUNT],
            ['value' => $request->getMinDepositAmount()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::MINIMUM_WITHDRAW_AMOUNT],
            ['value' => $request->getMinWithdrawAmount()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::MINIMUM_TRANSFER_AMOUNT],
            ['value' => $request->getMinTransferAmount()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::TRANSFER_COMMISSION],
            ['value' => $request->getTransferCommission()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::SECURED_DEAL_WARNING],
            ['value' => $request->getSecuredDealWarning()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::CONTACT_US_HEADER],
            ['value' => $request->getContactUsHeader()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::CONTACT_US_TEXT],
            ['value' => $request->getContactUsText()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::PAYMENT_HEADER],
            ['value' => $request->getPaymentHeader()],
        );

        Setting::updateOrCreate(
            ['name' => Setting::PAYMENT_TEXT],
            ['value' => $request->getPaymentText()],
        );
    }
}
