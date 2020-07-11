<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $fillable = [
        'token',
        'email'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
