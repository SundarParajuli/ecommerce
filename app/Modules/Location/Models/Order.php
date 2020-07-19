<?php

namespace App\Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	const PRODUCT_TYPES= ["vegetables"=>"तरकारी","clothes"=>"लत्ता कपडा","constructions"=>"निर्माण सामाग्री","food"=>"खाध्यान्न", "others"=>"अन्य"];
    protected $fillable = [
        'id',
        'status',
        'is_delivered',
        'discount',
        'location',
        'delivery_charge',
        'total'
    ];

    
}
