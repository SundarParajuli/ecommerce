<?php

namespace App\Modules\User\Repositories;


interface CustomerInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function save($data);

    public function find($id);

    public function create($data);

    public function upload($file);

    public function checkMobile($mobile, $code);

    public function saveSocialUser($data, $identifier);

    public function update($id, $data);

    public function getTotal();

    public function changeStatus($id);

    public function verifyStatus($id);

    public function delete($ids);

    public function findWhere($where, $value);
}
