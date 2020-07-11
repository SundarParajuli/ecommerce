<?php

namespace App\Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'phone',
        'name',
        'product_name', 
        'status'
    ];
}
