<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 3/19/18
 * Time: 12:07 PM
 */

namespace App\Modules\Setting\Repositories;

use App\Modules\Setting\Models\Setting;

class SettingRepository implements SettingInterface
{
    public function find($id)
    {
        return Setting::find($id);
    }

    public function save($data)
    {
        try {
            Setting::create($data);
        } catch (\Throwable $t) {
            dd($t->getMessage());
        }

    }

    public function update($id, $data)
    {
        $settingInfo = Setting::find($id);

        return $settingInfo->update($data);
    }

    public function createOrupdate($where, $data)
    {
        try {
            Setting::updateOrCreate($where, $data);
        } catch (\Throwable $t) {
            dd($t->getMessage());
        }
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
        $file->move(public_path() . Setting::SETTING_LOGO_PATH, $fileName);

        return $fileName;
    }

}