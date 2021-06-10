<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public const BTC_TYPE = 'btc';
    public const ETH_TYPE = 'eth';
    public const BCH_TYPE = 'bch';

    public const ADDRESS_LENGTH = 36;

    protected $fillable = [
        'currency_type',
        'address',
        'amount',
        'owner_id'
    ];

    protected $attributes = [
        'amount' => 0
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
