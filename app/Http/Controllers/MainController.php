<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

final class MainController extends Controller
{
    public function index()
    {
        return view('main', [
            'mainWelcomeDescription' => Setting::where('name', Setting::WELCOME_DESCRIPTION)->first()->value,
            'mainWelcomeHeader' => Setting::where('name', Setting::WELCOME_HEADER)->first()->value,
            'protectionAdvantage' => Setting::where('name', Setting::PROTECTION_ADVANTAGE)->first()->value,
            'safetyAdvantage' => Setting::where('name', Setting::SAFETY_ADVANTAGE)->first()->value,
            'supportAdvantage' => Setting::where('name', Setting::SUPPORT_ADVANTAGE)->first()->value,
            'stabilityAdvantage' => Setting::where('name', Setting::STABILITY_ADVANTAGE)->first()->value,
            'mainTradingDesc' => Setting::where('name', Setting::TRADING_DESCRIPTION)->first()->value,
            'securedDealDesc' => Setting::where('name', Setting::SECURED_DEAL_DESCRIPTION)->first()->value
        ]);
    }

    public function about()
    {
        return view('about', [
            'aboutSettings' => Setting::getSetting(Setting::ABOUT),
        ]);
    }

    public function terms()
    {
        return view('terms', [
            'userAgreement' => Setting::getSetting(Setting::USER_AGREEMENT),
            'userAgreementPoints' => Setting::getSetting(Setting::USER_AGREEMENT_POINTS),
        ]);
    }

    public function contacts()
    {
        return view('contacts', [
            'contactUsHeader' => Setting::getSetting(Setting::CONTACT_US_HEADER),
            'contactUsText' => Setting::getSetting(Setting::CONTACT_US_TEXT),
        ]);
    }

    public function payment()
    {
        return view('payment', [
            'paymentHeader' => Setting::getSetting(Setting::PAYMENT_HEADER),
            'paymentText' => Setting::getSetting(Setting::PAYMENT_TEXT),
        ]);
    }

}
