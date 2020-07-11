<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Http\Requests\ChangePasswordFormRequest;
use App\Modules\User\Http\Requests\MobileVerifyFormRequst;
use App\Modules\User\Http\Requests\SendVerificationCodeFormRequst;
use App\Modules\User\Http\Requests\UserFormRequest;
use App\Modules\User\Models\User;
use App\Modules\User\Repositories\RoleInterface;
use App\Modules\User\Repositories\UserInterface;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash as Flash;

class UserController extends Controller
{

    protected $user;
    protected $branch;
    protected $country;
    protected $role;
    protected $university;
    protected $testPreparationClass;

    public function __construct(
        UserInterface $user,
        RoleInterface $role
    )
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function profile()
    {
        $data['user'] = $this->user->find(Auth::User()->id);
        return view('user::user.user-profile', $data);

    }

    public function updateProfile(Request $request, $id)
    {
        $input = $request->all();

        $user = $this->user->find($id);
        $user->update($input);

        $userProfile = $user->userProfile;
        $userProfile->first_name = $input['first_name'];
        $userProfile->last_name = $input['last_name'];
        $userProfile->profile_image = $input['profile_image'];
        $userProfile->phone = $input['phone'];
        $userProfile->mobile = $input['mobile'];
        $userProfile->address_line1 = $input['address_line1'];

        $userProfile->save();

        if (isset($input['role'])) {
            $roleId = $input['role'];
            $user->roles()->detach();
            $user->roles()->attach($roleId);
        } else {
            $user->roles()->detach();
        }

        Flash::success("User Updated  successfully");

        return redirect()->back();
    }

    public function changePassword()
    {
        return view('user::auth.changePassword');
    }

    public function changePasswordPost(ChangePasswordFormRequest $request)
    {
        $oldPassword = auth()->guard('admins')->User()->password;

        $currentPassword = $request->input('current_password');
        if (Hash::check($currentPassword, $oldPassword)) {
            $data['password'] = bcrypt($request->input('password'));
            $this->user->update(Auth::user()->id, $data);
            Flash::success("Password Change Successfully ");

            return redirect(route('dashboard'));

        } else {
            Flash::error("Current Password Not Match");

            return redirect(route('user.changePassword'));
        }
    }

    public function sendVerificationCodeToMobile()
    {
        return view('site::user.user-mobile-send-verification-code');
    }

    public function sendVerificationCodeToMobilePost(SendVerificationCodeFormRequst $request)
    {
        $all = $request->all();
        $userId = auth()->guard('admins')->User()->id;

        $code = strtolower(str_random(4));
        $all['mobile_verification_code'] = $code;

        $this->user->update($userId, $all);

        $res = $this->smsVerify($all['mobile'], $code);

        if ($res) {

            Flash::success("Verification code sent Successfully. Please view your sms.");

            return redirect(route('mobile.verify'));
        }

    }

    public function smsVerify($mobile, $code)
    {

        $client = new GuzzleClient();

        $response = $client->get(
            'http://smsprima.com/api/api/index',
            [
                'query' => [
                    'username' => 'bidhee',
                    'password' => 'sms@12345',
                    'sender' => 'SMSservice',
                    'destination' => $mobile,
                    'type' => 1,
                    'message' => "Verification Code::  " . $code,
                ]
            ]
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode == 200) {
            return true;
        }

        return false;
    }

    public function verifyMobile()
    {
        return view('site::user.verify-mobile');
    }

    public function verifyMobilePost(MobileVerifyFormRequst $request)
    {
        $code = $request->get('code');
        $mobile = auth()->guard('admins')->User()->mobile;

        $res = $this->user->checkMobile($mobile, $code);

        if ($res) {

            Flash::success("Mobile verified successfully");

            return redirect(route('order.your-shopping-cart'));

        } else {

            Flash::error("Verification code mismatch");

            return redirect(route('mobile.verify'));
        }
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $filter = $input;
        $data['roles'] = $this->role->findAll();
        $filter['q'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $users = $this->user->findAll($limit = 10, $filter, $sort);
        $users->appends(['q' => $filter['q']]);
        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('user::user.index', compact('users', 'sort'));
    }

    public function create()
    {
        $data['roles'] = $this->role->findList();
        return view('user::user.create', $data);
    }

    public function store(UserFormRequest $request)
    {
        $input = $request->all();
        $input['user_type'] = User::userType()['admin'];
        $input['status'] = 1;
        $input['created_by_id'] = auth()->guard('admins')->User()->id;;
        $roleId = $input['role'];

        try {

            $user = $this->user->create($input);
            $user->userProfile()->create($input);
            $user->roles()->attach($roleId);

        } catch (\Throwable $t) {
            Flash::error($t->getMessage());

        }

        Flash::success("User Created  successfully");

        return redirect(route('user.index'));

    }

    public function edit($id)
    {
        $data['user'] = $user = $this->user->find($id);
        $data['userRoles'] = $this->role->findList();

        return view('user::user.edit', $data);
    }

    public function update(UserFormRequest $request, $id)
    {
        $input = $request->all();

        $user = $this->user->find($id);
        $user->update($input);

        $userProfile = $user->userProfile;
        $userProfile->first_name = $input['first_name'];
        $userProfile->last_name = $input['last_name'];
        $userProfile->profile_image = $input['profile_image'];
        $userProfile->phone = $input['phone'];
        $userProfile->mobile = $input['mobile'];
        $userProfile->address_line1 = $input['address_line1'];

        $userProfile->save();

        if (isset($input['role'])) {
            $roleId = $input['role'];
            $user->roles()->detach();
            $user->roles()->attach($roleId);
        } else {
            $user->roles()->detach();
        }

        Flash::success("User Updated  successfully");

        return redirect(route('user.edit', ['id' => $id]));

    }

    public function status(Request $request)
    {

        try {

            if ($request->ajax()) {

                $stat = null;
                $id = $request->input('id');

                $status = $this->user->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x text-danger-800"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x text-success-800"></i>';
                }

                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {

            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {

            if ($request->has('toDelete')) {
                $this->user->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");

            } else {
                Flash::error("Please check at least one to delete");
            }


        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('user.index'));
    }

}
