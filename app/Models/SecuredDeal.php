<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecuredDeal extends Model
{
    public const SELLER_TYPE = 'seller';
    public const BUYER_TYPE = 'buyer';

    protected $fillable = [
        'seller_id',
        'buyer_id',
        'second_party_nickname',
        'conditions',
        'deadline',
        'currency_type',
        'amount',
        'password',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }
}
