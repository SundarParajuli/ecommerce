<?php
/**
 * Created by PhpStorm.
 * User: bidhee
 * Date: 8/20/18
 * Time: 9:53 AM
 */

namespace App\Modules\Location\Repositories;


use App\Modules\Location\Models\Seller;

class SellerRepository implements SellerInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Seller::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;

    }

    public function find($id)
    {
        return Seller::find($id);
    }

    public function findList()
    {
        return Seller::pluck('name', 'id');
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Seller::create($data);
    }

    public function update($id, $data)
    {
        $district = Seller::find($id);

        return $district->update($data);
    }

    public function delete($ids)
    {
        return Seller::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }

        $row = Seller::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = Seller::find($id);

        return $row->status;
    }
}