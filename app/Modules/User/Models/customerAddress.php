<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = [

        'customer_id',
        'name',
        'address',
        'address_2',
        'mobile',
        'email',
        'country_id',
        'district_id',
        'city',
        'zip_code',
        'is_primary',
        'detail',

        'office_phone',
        'home_phone'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
