<?php

namespace App\Models;

use App\Services\CryptoCurrencyCourse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;

    public const USER_ROLE = 'user';
    public const ADMIN_ROLE = 'admin';

    public const AVATAR_PATH = 'public/avatars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname',
        'role',
        'avatar',
        'email',
        'password',
        'two_factor_code',
        'two_factor_method',
        'telegram_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'two_factor_active' => false,
    ];

    public function btcWallet()
    {
        return $this->hasOne(Wallet::class, 'owner_id', 'id')
            ->where('currency_type', '=', Wallet::BTC_TYPE)
            ->latest('created_at');
    }

    public function ethWallet()
    {
        return $this->hasOne(Wallet::class, 'owner_id', 'id')
            ->where('currency_type', '=', Wallet::ETH_TYPE)
            ->latest('created_at');
    }

    public function bchWallet()
    {
        return $this->hasOne(Wallet::class, 'owner_id', 'id')
            ->where('currency_type', '=', Wallet::BCH_TYPE)
            ->latest('created_at');
    }

    public function isAdmin()
    {
        return $this->role === self::ADMIN_ROLE;
    }

    public function isUser()
    {
        return $this->role = self::USER_ROLE;
    }
}
