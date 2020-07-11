<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\Customer;
use App\Modules\User\Models\User;
use Hash;


class UserRepository implements UserInterface
{

    const USER_FIELD = 'admin';

    private static $path = '/userProfile';

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = User::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['email'])) {
                $query->where('email', $filter['email']);

            }
            if (isset($filter['start_date'])) {
                $query->where('created_at', '>=', $filter['start_date']);
            }

            if (isset($filter['end_date'])) {
                $query->where('created_at', '<=', $filter['end_date']);
            }

            $query->whereHas('userProfile', function ($query) use ($filter) {
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
            ->whereIn('status', $status)
            ->whereNotIn('user_type', ['super_admin', 'vendor', 'web'])
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function findAllWithAdmin($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = User::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');

            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;
    }

    public function findAllCustomer($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Customer::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['email'])) {
                $query->where('email', $filter['email']);

            }

            if (isset($filter['is_email_verified'])) {
                $query->where('is_email_verified', $filter['is_email_verified']);
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
            ->whereIn('status', $status)
            ->where('user_type', 'customer')
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(isset($limit) ? $limit : env('DEF_PAGE_LIMIT', 12));

        return $result;
    }

    public function save($data)
    {

        $data['password'] = bcrypt($data['password']);
        $data['user_field'] = self::USER_FIELD;

        try {

            $user = User::create($data);
            $user = User::find($user->id);

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
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function saveSocialUser($data, $identifier)
    {
        $user = User::where('social_id', $identifier)->first();

        if ($user) {
            $user->update($data);

            return $user;
        } else {
            $user = User::create($data);
            $user->userProfile()->create($data);
            return $user;
        }
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function checkMobile($mobile, $code)
    {
        $user = User::where('mobile', $mobile)
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
        $user = User::find($userId);

        return $user->update($data);
    }

    public function getTotal()
    {
        $user = User::where('user_field', '<>', 'admin')->get();

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
        $row = User::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = User::find($id);

        return $row->status;
    }

    public function delete($ids)
    {
        return User::destroy($ids);
    }

}
