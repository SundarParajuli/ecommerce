<?php
/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/20/18
 * Time: 9:53 AM
 */

namespace App\Modules\Location\Repositories;


interface SellerInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function findList();

    public function save($data);

    public function update($id, $role);

    public function delete($ids);

    public function changeStatus($id);

}