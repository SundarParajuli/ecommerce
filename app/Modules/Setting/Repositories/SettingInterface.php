<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 3/19/18
 * Time: 12:06 PM
 */

namespace App\Modules\Setting\Repositories;


interface SettingInterface
{
    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function createOrupdate($where, $data);

    public function upload($file);

}