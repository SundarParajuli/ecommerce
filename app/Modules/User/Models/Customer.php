<?php

namespace App\Modules\User\Models;
 
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'user_type',
        'created_by_id',
        'verify_token',
        'registered_ip',
        'is_email_verified',
        'status',
        'active',
        'last_active',
        'provider_id',
        'provider' 
    ];

    protected $hidden = [ 
        'remember_token',
        'user_type',
        'created_by_id',
        'deleted_at',
        'status',
        'username'
    ];

    public function customerProfile()
    {
        return $this->hasOne(CustomerProfile::class);
    }

    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function verifyEmail()
    {
        return $this->hasOne(VerifyEmail::class);
    }

    public function resetPassword()
    {
        return $this->hasOne(ResetPassword::class);
    }
}
