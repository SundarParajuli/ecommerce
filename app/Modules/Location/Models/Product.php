<?php

namespace App\Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	const PRODUCT_TYPES= ["vegetables"=>"तरकारी","clothes"=>"लत्ता कपडा","constructions"=>"निर्माण सामाग्री","food"=>"खाध्यान्न", "others"=>"अन्य"];
    protected $fillable = [
        'name',
        'type',
        'min_price_retail',
        'max_price_retail',
        'min_price_wholesale',
        'max_price_wholesale',
        'sort_order',
        'unit',
        'status'
    ];

    
}
