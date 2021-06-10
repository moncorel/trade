<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public const FILES_DIRECTORY = 'public/settings';
    public const LOGOTYPE_NAME = 'logo.png';

    public const LOGOTYPE = 'logotype';
    public const WELCOME_HEADER = 'welcome_header';
    public const WELCOME_DESCRIPTION = 'welcome_description';
    public const PROTECTION_ADVANTAGE = 'protection_advantage';
    public const SAFETY_ADVANTAGE = 'safety_advantage';
    public const SUPPORT_ADVANTAGE = 'support_advantage';
    public const STABILITY_ADVANTAGE = 'stability_advantage';
    public const SECURED_DEAL_DESCRIPTION = 'secured_deal_description';
    public const TRADING_DESCRIPTION = 'trading_description';
    public const ADDRESS = 'address';
    public const EMAIL = 'email';
    public const ABOUT = 'about-text';
    public const USER_AGREEMENT = 'user-agreement';
    public const USER_AGREEMENT_POINTS = 'user-agreement-points';
    public const WITHDRAW_MESSAGE = 'withdraw_message';
    public const TRADING_MESSAGE = 'trading-message';

    public const MINIMUM_DEPOSIT_AMOUNT = 'min_deposit_amount';
    public const MINIMUM_WITHDRAW_AMOUNT = 'min_withdraw_amount';
    public const MINIMUM_TRANSFER_AMOUNT = 'min_transfer_amount';
    public const TRANSFER_COMMISSION = 'transfer_commission';

    public const SECURED_DEAL_WARNING = 'secured-deal-warning';

    public const CONTACT_US_HEADER = 'contact_us_header';
    public const CONTACT_US_TEXT = 'contact_us_text';

    public const PAYMENT_HEADER = 'payment_header';
    public const PAYMENT_TEXT = 'payment_text';

    protected $fillable = [
        'name',
        'image_link',
        'value',
    ];

    public static function logotypeExists()
    {
        return !!self::where('name', '=', self::LOGOTYPE)->first();
    }

    public static function getAddress()
    {
        return self::where('name', self::ADDRESS)->first()->value ?? '';
    }

    public static function getEmail()
    {
        return self::where('name', self::EMAIL)->first()->value ?? '';
    }

    public static function getSetting(string $settingType)
    {
        return self::where('name', $settingType)->first()->value ?? '';
    }
}
