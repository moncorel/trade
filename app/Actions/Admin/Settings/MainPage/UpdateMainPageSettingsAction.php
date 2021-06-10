<?php

namespace App\Actions\Admin\Settings\MainPage;

use App\Models\Setting;

final class UpdateMainPageSettingsAction
{
    public function execute(UpdateMainPageSettingsRequest $request)
    {
        Setting::updateOrCreate(
            ['name' => Setting::WELCOME_HEADER],
            ['value' => $request->getWelcomeHeader()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::WELCOME_DESCRIPTION],
            ['value' => $request->getWelcomeDescription()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::SECURED_DEAL_DESCRIPTION],
            ['value' => $request->getSecuredDealDescription()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::TRADING_DESCRIPTION],
            ['value' => $request->getTradingDescription()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::PROTECTION_ADVANTAGE],
            ['value' => $request->getProtectionAdvantage()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::SAFETY_ADVANTAGE],
            ['value' => $request->getSafetyAdvantage()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::SUPPORT_ADVANTAGE],
            ['value' => $request->getSupportAdvantage()]
        );

        Setting::updateOrCreate(
            ['name' => Setting::STABILITY_ADVANTAGE],
            ['value' => $request->getStabilityAdvantage()]
        );
    }
}
