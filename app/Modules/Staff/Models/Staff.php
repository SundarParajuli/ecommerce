<?php

namespace App\Modules\Staff\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    public $table = 'staffs';
//    const STAFF_TYPES= ["vegetables"=>"तरकारी","clothes"=>"लत्ता कपडा","constructions"=>"निर्माण सामाग्री","food"=>"खाध्यान्न", "others"=>"अन्य"];
    protected $fillable = [
        'phone',
        'name',
        'address',
        'status',
        'referred_by',
        'joined_date'
    ];
}
