<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 4/4/18
 * Time: 12:36 PM
 */

namespace App\Modules\Location\Repositories;


use App\Modules\Location\Models\Product;

class ProductRepository implements ProductInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Product::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');

            if (isset($filter['date'])) {
                $query->whereDate('created_at', $filter['date']);
            }
            if (isset($filter['type'])) {
                $query->where('type', $filter['type']);
            }
            return $query;
        })->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;

    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function findList()
    {
        return Product::pluck('name', 'id');
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Product::create($data);
    }

    public function update($id, $data)
    {
        $district = Product::find($id);

        return $district->update($data);
    }

    public function delete($ids)
    {
        return Product::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }

        $row = Product::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = Product::find($id);

        return $row->status;
    }

}