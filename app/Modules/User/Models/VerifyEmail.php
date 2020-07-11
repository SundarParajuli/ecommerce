<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyEmail extends Model
{
    protected $fillable = [
        'verification_token',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
