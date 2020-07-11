<?php

namespace App\Modules\User\Models;
 
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

     

    public static $role = [
        'customer' => 'customer',
        'vendor' => 'vendor',
        'admin' => 'admin',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'user_type',
        'created_by_id',
        'registered_ip',
        'status',
        'active',
        'last_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'user_type',
        'created_by_id',
        'deleted_at',
        'status',
        'username'
    ];

    public static function userType()
    {
        return [
            'customer' => 'customer',
            'vendor' => 'vendor',
            'admin' => 'admin',
        ];
    }


    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }
 

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
 
}
