<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

final class TradingController extends Controller
{
    public function index()
    {
        return view('personal.trading', [
            'tradingMessage' => Setting::getSetting(Setting::TRADING_MESSAGE),
        ]);
    }
}
