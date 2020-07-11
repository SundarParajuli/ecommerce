<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\Customer;
use Hash;


class CustomerRepository implements CustomerInterface
{

    const USER_FIELD = 'customer';

    private static $path = '/customer';

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Customer::when($filter, function ($query) use ($filter) {

            if (isset($filter['email'])) {
                $query->where('email', $filter['email']);

            }

            if (isset($filter['is_email_verified'])) {
                $query->where('is_email_verified', (int)$filter['is_email_verified']);
            }

            if (isset($filter['start_date'])) {
                $query->where('created_at', '>=', $filter['start_date']);
            }

            if (isset($filter['end_date'])) {
                $query->where('created_at', '<=', $filter['end_date']);
            }

            $query->whereHas('customerProfile', function ($query) use ($filter) {
                if (isset($filter['first_name'])) {
                    $query->where('first_name', 'like', '%' . $filter['first_name'] . '%');
                }

                if (isset($filter['last_name'])) {
                    $query->where('last_name', 'like', '%' . $filter['last_name'] . '%');
                }

                if (isset($filter['mobile'])) {
                    $query->where('mobile', $filter['mobile']);
                }
            });

            return $query;
        })
            ->where('user_type', 'customer')
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function save($data)
    {
        $data['user_field'] = self::USER_FIELD;

        try {

            $user = Customer::create($data);
            $user = Customer::find($user->id);

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
        return Customer::create($data);
    }

    public function saveSocialUser($data, $identifier)
    { 
        $user = Customer::where('provider_id', $identifier)->first();

        if ($user) {
            $user->update($data);

            return $user;
        } else {
            $user = Customer::create($data);
            $user->customerProfile()->create($data);
            return $user;
        }
    }

    public function checkMobile($mobile, $code)
    {
        $user = Customer::where('mobile', $mobile)
            ->where('mobile_verification_code', $code)
            ->first();

        if ($user) {

            $user->verified = 1;
            $user->save();

            return true;

        } else {
            return false;
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
        $user = Customer::find($userId);

        return $user->update($data);
    }

    public function getTotal()
    {
        $user = Customer::where('user_field', '<>', 'admin')->get();

        return $user;
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);

        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = Customer::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = Customer::find($id);

        return $row->status;
    }

    public function verifyStatus($id)
    {
        $user = $this->find($id);
        $status = $user->is_email_verified;

        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
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

    public function find($id)
    {
        return Customer::find($id);
    }

    public function delete($ids)
    {
        return Customer::destroy($ids);
    }

    public function findWhere($where, $value)
    {
        return Customer::where($where, $value)->first();
    }

}
