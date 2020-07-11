<?php

namespace App\Modules\Setting\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const SETTING_LOGO_PATH = '/assets/uploads/company/setting/';

    protected $fillable = [
        'name',
        'logo',
        'fav_icon',
        'header_script',
        'footer_script',
        'footer_detail',
        'meta_key',
        'meta_title',
        'meta_description',
        'is_maintenance',
        'footer_logo',
        'address_line1',
        'address_line2',
        'address_line3',
        'mobile',
        'phone_1',
        'phone_2',
        'email_1',
        'email_2',
        'fax_1',
        'fax_2',
        'facebook',
        'google',
        'youtube',
        'twitter',
        'instagram',
        'google_map',
        'wattsapp_no',
        'viber_no',
        'created_by',
        'homepage',
        'adult_content_image'
    ];

    protected $appends = ['commit_hash'];

    public function getCommitHashAttribute()
    {
        ob_start();
        @exec('git rev-parse --verify HEAD 2> /dev/null', $output);
        $hash = $output[0];
        ob_end_clean();
        return $hash;
    }
}
