<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\PaymentCards;
use Hash;

class PaymentCardRepository implements PaymentCardInterface
{


    private static $path = '/assets/PaymentCards';


    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'])
    {
        $result = PaymentCards::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['title'])) {
                $query->where('title', 'like', '%' . $filter['title'] . '%');

            }

            if (isset($filter['customer_id'])) {
                $query->where('customer_id', '=', $filter['customer_id']);

            }
            if (isset($filter['start_date'])) {
                $query->where('created_at', '>=', $filter['start_date']);
            }

            if (isset($filter['end_date'])) {
                $query->where('created_at', '<=', $filter['end_date']);
            }
            return $query;
        })
            ->orderBy($sort['by'], $sort['sort']);
            if($limit !="all"){
                $result= $result->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999999999));
            }
            else{
                $result= $result->get();
            }
        return $result;
    }

    public function find($id)
    {
        return PaymentCards::find($id);
    }

    public function save($data)
    {
        $data['status'] = 1;
        return PaymentCards::create($data);
    }

    public function update($id, $data)
    {
        $banner = PaymentCards::find($id); 
        return $banner->update($data);
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . self::$path, $fileName);

        return $fileName;
    }

    public function delete($ids)
    {
        return PaymentCards::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = PaymentCards::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = PaymentCards::find($id);

        return $row->status;
    }

}
