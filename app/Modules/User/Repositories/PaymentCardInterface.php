<?php

namespace App\Modules\User\Repositories;


interface PaymentCardInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC']);

    public function find($id);

    public function save($data);

    public function update($id,$role);

    public function delete($ids);

    public function changeStatus($id);

}
