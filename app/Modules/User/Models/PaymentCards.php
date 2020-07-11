<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentCards extends Model
{
    protected $fillable = [
        'name', 
        'customer_id',
        'card_number',
        'expiry_month',
        'expiry_year', 
        'blocked',
        'security_code',
    ];

    protected $appends = ['last_four_card_number'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getLastFourCardNumberAttribute()
    {
        return substr($this->card_number, -4);
    }
}
