<?php

namespace App\Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	const TYPE= ["CUSTOMER","RETAILER,WHOLESALER"];
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'landline',
        'street_address',
        'city',
        'type',
        'pan_number',
        'description',
        'status'

    ];

    
}
