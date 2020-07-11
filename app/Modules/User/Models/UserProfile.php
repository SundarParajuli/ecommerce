<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'marital_status',
        'profile_image',
        'mobile',
        'phone',
        'phone',
        'address_line1',
        'address_line2',
        'address_line3',
        'bio',
    ];

    protected $appends = ['full_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }
}
