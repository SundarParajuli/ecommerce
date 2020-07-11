<?php

namespace App\Modules\User\Repositories;


interface CustomerAddressInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC']);

    public function save($data);

    public function find($userId, $addressId);

    public function create($data);

    public function upload($file);

    public function saveSocialUser($data, $identifier);

    public function update($id, $data);

    public function getTotal();

    public function changeStatus($customerId, $id);

    public function verifyStatus($id);

    public function delete($ids);

    public function findWhere($where, $value);

    public function findAddressByCustomerId($customerId);

}
