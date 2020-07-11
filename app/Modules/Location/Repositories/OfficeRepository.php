<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 4/4/18
 * Time: 12:38 PM
 */

namespace App\Modules\Location\Repositories;


use App\Modules\Location\Models\Office;

class OfficeRepository implements OfficeInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Office::when(array_keys($filter, true), function ($query) use ($filter) {
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
        return Office::find($id);
    }

    public function findList()
    {
        return Office::pluck('name', 'id');
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Office::create($data);
    }

    public function update($id, $data)
    {
        $district = Office::find($id);

        return $district->update($data);
    }

    public function delete($ids)
    {
        return Office::destroy($ids);
    }

    
    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }

        $row = Office::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = Office::find($id);

        return $row->status;
    }

}