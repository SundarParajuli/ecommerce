<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 4/4/18
 * Time: 12:38 PM
 */

namespace App\Modules\Location\Repositories;


use App\Modules\Location\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Category::when(array_keys($filter, true), function ($query) use ($filter) {
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
        return Category::find($id);
    }

    public function findList()
    {
        return Category::pluck('name', 'id');
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Category::create($data);
    }

    public function update($id, $data)
    {
        $district = Category::find($id);

        return $district->update($data);
    }

    public function delete($ids)
    {
        return Category::destroy($ids);
    }

    
    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }

        $row = Category::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = Category::find($id);

        return $row->status;
    }

}