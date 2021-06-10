<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public const PROCESSING_STATUS = 'processing';
    public const APPROVED_STATUS = 'approved';
    public const FAILED_STATUS = 'failed';

    public const DEPOSIT_TYPE = 'deposit';
    public const WITHDRAW_TYPE = 'withdraw';
    public const TRANSFER_TYPE = 'transfer';

    protected $fillable = [
        'type',
        'status',
        'amount',
        'with_commission',
        'currency_type',
        'sender_id',
        'receiver_id',
        'external_address',
    ];

    protected $attributes = [
        'status' => self::PROCESSING_STATUS
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
