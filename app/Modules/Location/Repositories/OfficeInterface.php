<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 4/4/18
 * Time: 12:38 PM
 */

namespace App\Modules\Location\Repositories;


interface OfficeInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function findList();

    public function save($data);

    public function update($id, $role);

    public function delete($ids);

    public function changeStatus($id);
 

}