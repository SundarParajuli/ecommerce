<?php

namespace App\Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'office_head',
        'name',
        'established_date',
        'address',
        'phone_number',
        'fax_number',
        'email',
        'office_head_number',
        'status' 
    ];

    
}
