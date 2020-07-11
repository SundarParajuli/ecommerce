<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\CustomerAddress;
use Hash;

class CustomerAddressRepository implements CustomerAddressInterface
{

    const USER_FIELD = 'customer';

    private static $path = '/customer';

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'])
    {

        $result = CustomerAddress::when($filter, function ($query) use ($filter) {

            if (isset($filter['email'])) {
                $query->where('email', $filter['email']);
            }

            if (isset($filter['is_email_verified'])) {
                $query->where('is_email_verified', (int)$filter['is_email_verified']);
            }

            if (isset($filter['customer_id'])) {
                $query->where('customer_id', (int)$filter['customer_id']);
            }

            if (isset($filter['start_date'])) {
                $query->where('created_at', '>=', $filter['start_date']);
            }

            if (isset($filter['end_date'])) {
                $query->where('created_at', '<=', $filter['end_date']);
            }

            if (isset($filter['full_name']) or isset($filter['mobile'])) {
                $query->whereHas('customerProfiles', function ($query) use ($filter) {
                    if (isset($filter['full_name'])) {
                        $query->where('full_name', 'like', '%' . $filter['full_name'] . '%');
                    }

                    if (isset($filter['mobile'])) {
                        $query->where('mobile', $filter['mobile']);
                    }
                });
            }

            return $query;
        })
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function save($data)
    {
        $data['user_field'] = self::USER_FIELD;

        try {

            $user = CustomerAddress::create($data);
            $user = CustomerAddress::find($user->id);

            // Attach Role
            foreach ($data['roles'] as $val) {
                $user->assignRole($val);
            }


            /*foreach ($data['permissions'] as $val) {
                $user->givePermissionTo($val);
            }*/

        } catch (Exception $e) {

        }

        return true;

    }

    public function create($data)
    {
        return CustomerAddress::create($data);
    }

    public function saveSocialUser($data, $identifier)
    {
        $user = CustomerAddress::where('provider_id', $identifier)->first();

        if ($user) {
            $user->update($data);

            return $user;
        } else {
            $user = CustomerAddress::create($data);
            $user->customerProfile()->create($data);

            return $user;
        }
    }

    public function getRoles()
    {
        return Role::lists('name', 'name');
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . self::$path, $fileName);

        return $fileName;
    }

    public function getPermissions()
    {
        return Permission::lists('name', 'name');
    }

    public function update($userId, $data)
    {
        $user = CustomerAddress::find($userId);

        return $user->update($data);
    }

    public function getTotal()
    {
        $user = CustomerAddress::where('user_field', '<>', 'admin')->get();

        return $user;
    }

    public function changeStatus($customerId, $id)
    {
        CustomerAddress::where('customer_id', $customerId)->update(['is_primary' => false]);
        if (CustomerAddress::where('id', $id)->update(['is_primary' => true])) {
            return true;
        }

        return false;
    }

    public function verifyStatus($id)
    {
        $user = $this->find($id);
        $status = $user->is_email_verified;

        if ($status == 0) {
            $stat = 1;
        } else if ($status == 1) {
            $stat = 0;
        }

        $user->is_email_verified = $stat;

        if ($user->save()) {

            $user = $this->find($id);

            return $user->is_email_verified;

        } else {
            return false;
        }
    }

    public function find($userId, $addressId)
    {
        return CustomerAddress::where('customer_id', $userId)->where('id', $addressId)->first();
    }

    public function delete($ids)
    {
        return CustomerAddress::destroy($ids);
    }

    public function findWhere($where, $value)
    {
        return CustomerAddress::where($where, $value)->get();
    }

    public function findAddressByCustomerId($customerId)
    {
        return CustomerAddress::where('customer_id', $customerId)->first();
    }
}
